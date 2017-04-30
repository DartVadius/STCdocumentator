<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Positions
 *
 * @author DartVadius
 */
class Positions implements iCalculation {

    private $positions;

    public function __construct($positions) {
        $this->positions = $positions;
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->positions)) {
            foreach ($this->positions as $position) {
                $summ += $position['summ'];
            }
        }        
        return $summ;
    }

    public function count() {
        return count($this->positions);
    }
    
    public function get() {
        return $this->positions;
    }

}
