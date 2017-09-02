<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Recipe
 *
 * @author DartVadius
 */
class Recipe implements iCalculation {

    private $title;
    private $materials;
    private $loss;

    public function __construct($recipe) {
        $this->title = $recipe['title'];
        $this->materials = $recipe['materials'];
        $this->loss = (!empty($recipe['loss'])) ? $recipe['loss'] : null;
//        $this->loss = $recipe['loss'];
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->materials)) {
            foreach ($this->materials as $material) {
                $summ += $material['summ'];
            }
        }
        if (!empty($this->loss)) {
            $summ += $summ / 100 * $this->loss; 
        }
        return $summ;
    }

    public function count() {
        return count($this->materials);
    }

    public function getTitle() {
        return $this->title;
    }

    public function get() {
        return $this->materials;
    }

    public function getPercent() {
        $summ = 0;
        if (!empty($this->materials)) {
            foreach ($this->materials as $material) {
                $summ += $material['%'];
            }
        }
        return $summ;
    }

    public function getNetto() {
        $netto = 0;
        foreach ($this->materials as $material) {
            $netto += $material['quantity'];
        }
        return $netto;
    }
    
    public function getLoss() {
        if (!empty($this->loss)) {
            return $this->loss;
        }
        return '0';
    }

}
