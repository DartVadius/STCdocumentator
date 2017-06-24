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

    public function __construct($recipe) {
        $this->title = $recipe['title'];
        $this->materials = $recipe['materials'];
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

}
