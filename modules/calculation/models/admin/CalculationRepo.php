<?php

namespace app\modules\calculation\models\admin;

use app\modules\calculation\models\admin\Calculation;

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
                    $this->calculation[$value->calculation_id] = $value;
                }
            }
        } else {
            if ($value instanceof Calculation) {
                $this->calculation[$value->calculation_id] = $value;
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
            $count = 1;
            foreach ($this->calculations as $value) {
                $value->calculation_product_title .= '(архив)';
                $value->calculation_archive = 1;
                $value->calculation_note = date('Y-m-d H:i:s');
                $value->save();
                $calc[$value->calculation_id] = $value;
                $count++;
            }
            $this->calculations = $calc;
        }
        return $this;
    }

}
