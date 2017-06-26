<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Materials
 *
 * @author DartVadius
 */
class Materials implements iCalculation {

    private $materials;

    public function __construct($materials) {
        $this->materials = $materials;
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->materials)) {
            foreach ($this->materials as $material) {
                if (empty($material['loss'])) {
                    $summ += $material['summ'];
                } else {
                    $summ += ($material['summ'] + $material['summ'] / 100 * $material['loss']);
                }
            }
        }
        return $summ;
    }

    public function summWithoutLosses() {
        $summ = 0;
        if (!empty($this->materials)) {
            foreach ($this->materials as $material) {
                $summ += $material['summ'];
            }
        }
        return $summ;
    }

    public function count() {
        return count($this->materials);
    }

    public function get() {
        return $this->materials;
    }
    
    /**
     * check of presence of planned losses at additional materials
     * 
     * @return boolean
     */
    public function lossesValidate() {
        foreach ($this->materials as $material) {
            if (!empty($material['loss'])) {
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function getSummWeight() {
        if (empty($this->materials)) {
            return FALSE;
        }
        $weight = 0;
        foreach ($this->materials as $material) {
            $weight += $material['quantity'];
        }
        return $weight;
    }

}
