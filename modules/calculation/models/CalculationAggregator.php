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
class CalculationAggregator extends \yii\db\ActiveRecord {

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

    /**
     * get array of unarchived calculations grouped by categories or by one category
     * 
     * @param integer $categoryId
     * @return boolean | array
     */
    public static function findCalculationByCategoryId($categoryId = NULL) {
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
                        ->andWhere(['calculation_archive' => '0'])
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
                    ->all();
        }
        if (empty($aggregat)) {
            return FALSE;
        }
        return $aggregat;
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
                if ($calc->count() > $count) {
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
                $data[$group][$key]['brutto'] = $agg->params->weight / 1000;
                $data[$group][$key]['sealant_weight'] = $agg->params->weight / 1000 - $agg->materials->getSummWeight();
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
    public static function recreateCalculations() {
        $productModel = new Product();
        $repo = new CalculationRepo();
        $repo->saveAllasArchived();
        $allProducts = $productModel->find()->where(['product_archiv' => '0'])->all();
        foreach ($allProducts as $product) {
            $productAggregator = new ProductAggregator($product);
            $calculationAggregator = Connector::getCalculationAggregator($productAggregator);
            $calculation = Connector::setCalculationModel($calculationAggregator);
            $calculation->save();
        }
        return TRUE;
    }

}
