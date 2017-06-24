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
    private $materialsAdditional;
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
    }

    public function setId($id) {
        $this->id = $id;
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
}
