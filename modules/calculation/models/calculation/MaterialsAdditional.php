<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Materials
 *
 * @author DartVadius
 */
class MaterialsAdditional implements iCalculation {

    private $materialsAdditional;

    public function __construct($materialsAdditional) {
        $this->materialsAdditional = $materialsAdditional;
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->materialsAdditional)) {
            foreach ($this->materialsAdditional as $material) {
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
        if (!empty($this->materialsAdditional)) {
            foreach ($this->materialsAdditional as $material) {
                $summ += $material['summ'];
            }
        }
        return $summ;
    }

    public function count() {
        return count($this->materialsAdditional);
    }

    public function get() {
        return $this->materialsAdditional;
    }
    
    public function lossesValidate() {
        foreach ($this->materialsAdditional as $material) {
            if (!empty($material['loss'])) {
                return TRUE;
            }
        }
        return FALSE;
    }

}
