<?php

namespace app\modules\calculation\models\admin;

use app\modules\product\models\admin\Product;
use yii\helpers\ArrayHelper;

/**
 * Description of CalculationRepo
 *
 * @author DartVadius
 */
class CalculationRepo {

    private $calculations = [];

    public function __construct() {
        $calculationModel = new Calculation();
        $calculations = $calculationModel->find()->where(['calculation_archive' => '0'])->all();
        if (!empty($calculations)) {
            $calc = [];
            foreach ($calculations as $value) {
                if ($value instanceof Calculation) {
                    $calc[$value->calculation_id] = $value;
                }
            }
            $this->calculations = $calc;
        }
    }

    public function save($calculation) {
        if (is_array($calculation)) {
            foreach ($calculation as $value) {
                if ($value instanceof Calculation) {
                    $this->calculations[$value->calculation_id] = $value;
                }
            }
        } else {
            if ($calculation instanceof Calculation) {
                $this->calculations[$calculation->calculation_id] = $calculation;
            }
        }
        return $this;
    }

    public function findAll() {
        return $this->calculations;
    }

    public function clear() {
        $this->calculations = [];
        return $this;
    }

    public function saveAllasArchived() {
        if (!empty($this->calculations)) {
            $calc = [];
            foreach ($this->calculations as $value) {
                $value->calculation_product_title .= '(архив)';
                $value->calculation_archive = 1;
                $value->calculation_note = date('Y-m-d H:i:s');
                $value->save();
                $calc[$value->calculation_id] = $value;
            }
            $this->calculations = $calc;
        }
        return $this;
    }

    public function saveByCategoryIdasArchived($categoryId) {
        $productsId = Product::find()->select('product_id')->where(['product_category_id' => $categoryId])->asArray()->all();
        $ids = ArrayHelper::getColumn($productsId, 'product_id');
        if (!empty($this->calculations)) {
            $calculations = $this->calculations;
            foreach ($this->calculations as $value) {
                if (in_array($value->calculation_product_id, $ids)) {
                    $value->calculation_product_title .= '(архив)';
                    $value->calculation_archive = 1;
                    $value->calculation_note = date('Y-m-d H:i:s');
                    $value->save();
                    $calculations[$value->calculation_id] = $value;
                }
            }
            $this->calculations = $calculations;
        }
        return $this;
    }

}
