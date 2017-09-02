<?php

namespace app\modules\calculation\models;

use Yii;
use app\modules\calculation\models\calculation\Params;
use app\modules\calculation\models\calculation\Materials;
use app\modules\calculation\models\calculation\MaterialsAdditional;
use app\modules\calculation\models\calculation\Recipe;
use app\modules\calculation\models\calculation\Packs;
use app\modules\calculation\models\calculation\Positions;
use app\modules\calculation\models\calculation\Expenses;
use app\modules\calculation\models\calculation\Losses;
use app\modules\product\models\admin\Product;
use app\modules\product\models\admin\CategoryProduct;
use app\modules\directory\models\Config;
use app\modules\classes\Connector;
use app\modules\product\models\ProductAggregator;
use app\modules\calculation\models\admin\CalculationRepo;

/**
 * Description of CalculationAggregator
 * 
 * @author DartVadius
 *
 * @property Params $params
 * @property Materials $materials
 * @property Recipe $recipe
 * @property Packs $packs
 * @property Positions $positions
 * @property Expenses $expenses
 * @property Losses $losses
 */
class CalculationAggregator {

    private $id;
    private $params;
    private $materials;
    private $materialsAdditional = NULL;
    private $recipe;
    private $packs;
    private $positions;
    private $expenses;
    private $losses;

    public function __construct($params, $materials, $materialsAdditional, $recipe, $packs, $positions, $expenses, $losses) {
        $this->params = new Params($params);
        $this->materials = new Materials($materials);
        $this->materialsAdditional = new MaterialsAdditional($materialsAdditional);
        $this->recipe = new Recipe($recipe);
        $this->packs = new Packs($packs);
        $this->positions = new Positions($positions);
        $this->expenses = new Expenses($expenses);
        $this->losses = new Losses($losses, $this->summRealExpenses());
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function __get($name) {
        if (!empty($this->$name)) {
            return $this->$name;
        }
        return FALSE;
    }

    private function summRealExpenses() {
        return $this->materials->summ() +
                $this->materialsAdditional->summ() +
                $this->recipe->summ() +
                $this->packs->summ() +
                $this->expenses->summ() +
                $this->positions->summ();
    }

    public function summ() {
        return $this->summRealExpenses() + $this->losses->summ();
    }

    public function getNetto() {
        
    }

    /**
     * get array of unarchived calculations grouped by categories or by one category
     * 
     * @param integer $categoryId
     * @return boolean | array
     */
    public static function findCalculationByCategoryId($categoryId = NULL, $archive = 0) {
        $aggregat = [];
        if ($categoryId === NULL) {
            $categories = CategoryProduct::find()->all();
            if (empty($categories)) {
                return FALSE;
            }
            foreach ($categories as $category) {
                $products = Product::find()
                        ->where(['product_category_id' => $category->category_product_id])
                        ->column();
                if (empty($products)) {
                    continue;
                }
                $aggregat[$category->category_product_title] = admin\Calculation::find()
                        ->where(['calculation_product_id' => $products])
                        ->andWhere(['calculation_archive' => $archive])
                        ->orderBy('calculation_product_title')
                        ->all();
            }
        } else {
            $category = CategoryProduct::findOne($categoryId);
            $products = Product::find()
                    ->where(['product_category_id' => $category->category_product_id])
                    ->column();
            if (empty($products)) {
                return FALSE;
            }
            $aggregat[$category->category_product_title] = admin\Calculation::find()
                    ->where(['calculation_product_id' => $products])
                    ->andWhere(['calculation_archive' => '0'])
                    ->orderBy('calculation_product_title')
                    ->all();
        }
        if (empty($aggregat)) {
            return FALSE;
        }
        return $aggregat;
    }

    /**
     * get array calculations grouped by selected categories
     * 
     * @param array $ids
     * @return array
     */
    public static function findCalculationByCategoryIds($ids, $archive = 0) {
        $data = [];
        if (!empty($ids)) {
            foreach ($ids as $category_id) {
                $val = self::findCalculationByCategoryId($category_id, $archive);
                if (!empty($val)) {
                    $data[] = $val;
                }
            }
        }
        return $data;
    }

    public static function findAggregatorByCategoryIds($data) {
        $aggregat = [];
        foreach ($data as $group) {
            foreach ($group as $key => $calculations) {
                foreach ($calculations as $calculation) {
                    $aggregat[$key][] = Connector::getCalculationAggregator($calculation);
                }
            }
        }
        return $aggregat;
    }

    public static function findAggregatByPeriodAndCategory($categories, $from, $to) {
        if (empty($categories)) {
            return FALSE;
        }
        $aggregat = [];

        foreach ($categories as $categoryId) {
            $category = CategoryProduct::findOne($categoryId);
            $products = self::findProductByCategory($category);
            $resStart = self::findAggregatByPeriod($products, $from['start'], $from['end']);
            $resEnd = self::findAggregatByPeriod($products, $to['start'], $to['end']);
            $aggregat[$category->category_product_title] = self::formAggregatForStatistic($resStart, $resEnd);
        }
        if (empty($aggregat)) {
            return FALSE;
        }
        return $aggregat;
    }

    private static function findProductByCategory(CategoryProduct $category) {
        return Product::find()->where(['product_category_id' => $category->category_product_id])
                        ->column();
    }

    private static function findAggregatByPeriod($products, $start, $end) {
        if ($products == NULL) {
            return NULL;
        }
        $aggregates = admin\Calculation::find()
                ->where(['calculation_product_id' => $products])
                ->andwhere(['and', ['>=', 'calculation_date', $start], ['<=', 'calculation_date', $end]])
                ->all();
        if (empty($aggregates)) {
            return NULL;
        }
        $data = Connector::getCalculationAggregator($aggregates);
        return $data;
    }

    private static function formAggregatForStatistic($resStart, $resEnd) {
        $data = [];
        if (!empty($resStart)) {
            foreach ($resStart as $key => $aggregat) {
                $product = Product::findOne($aggregat->params->product_id);
                $data[$product->product_title]['start'][] = $aggregat->summ();
            }
        }
        if (!empty($resEnd)) {
            foreach ($resEnd as $key => $aggregat) {
                $product = Product::findOne($aggregat->params->product_id);
                $data[$product->product_title]['end'][] = $aggregat->summ();
            }
        }

        return $data;
    }

    /**
     * get array from findCalculationByCategoryId() and return maximum number
     * of packs in product
     * 
     * @param array $aggregat
     * @return boolean | integer
     */
    public static function findMaxPacksCount($aggregat) {
        if (empty($aggregat)) {
            return FALSE;
        }
        $count = 0;
        foreach ($aggregat as $calculations) {
            foreach ($calculations as $calculation) {
                $calc = unserialize($calculation->calculation_packs_data);
                if (!empty($calc) && ($calc->count() > $count)) {
                    $count = $calc->count();
                }
            }
        }
        return $count;
    }

    /**
     * 
     * @param array $aggregat
     * @return boolean | array
     */
    public static function getDataForConsolidatedStatement($aggregat) {
        $config = new Config();
        $data = [];
        if (empty($aggregat)) {
            return FALSE;
        }
        foreach ($aggregat as $group => $calculations) {
            foreach ($calculations as $key => $calculation) {
                $agg = \app\modules\classes\Connector::getCalculationAggregator($calculation);
                $data[$group][$key]['name'] = $agg->params->title;
                $data[$group][$key]['summ'] = round($agg->summ(), 2);
                $data[$group][$key]['capacity_hour'] = $agg->params->capacity;
                $shift = $config->find()->where(['config_system_name' => 'shift_duration'])->one()['config_value'];
                $data[$group][$key]['capacity_shift'] = $agg->params->capacity * $shift;
                $data[$group][$key]['recipe'] = $agg->recipe->getTitle();
                $data[$group][$key]['brutto'] = $agg->recipe->getNetto() + $agg->materials->getNetto() + $agg->materialsAdditional->getNetto();
                $data[$group][$key]['sealant_weight'] = $agg->recipe->getNetto();
                $agg->packs->sortPacksByCapacity();
                $data[$group][$key]['packs'] = $agg->packs->get();
            }
        }
        return $data;
    }

    /**
     * make all old calculations archival and create new of not archival products
     * 
     * @return boolean
     */
    public static function recreateCalculations($categoryId = null) {
        $productModel = new Product();
        $repo = new CalculationRepo();
        if (empty($categoryId)) {
            $repo->saveAllasArchived();
        } else {
            $repo->saveByCategoryIdasArchived($categoryId);
        }

        $select = $productModel->find()
            ->where(['product_archiv' => '0']);
        if (!empty($categoryId)) {
            $select->andWhere(['product_category_id' => $categoryId]);
        }
        $allProducts = $select->all();
        foreach ($allProducts as $product) {
            $productAggregator = new ProductAggregator($product);
            $calculationAggregator = Connector::getCalculationAggregator($productAggregator);
            $calculation = Connector::setCalculationModel($calculationAggregator);
            $calculation->save();
        }
        return TRUE;
    }

}
