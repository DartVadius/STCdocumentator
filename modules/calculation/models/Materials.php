<?php

namespace app\modules\calculation\models;

/**
 * Description of Materials
 *
 * @author DartVadius
 */
class Materials {

    private $materials;

    public function __construct($materials) {
        $this->materials = $materials;
    }
    
    public function summ() {
        $summ = NULL;
        foreach ($this->materials as $material) {
            $summ += $material['summ'];
        }
        return $summ;
    }
    
}
