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

}
