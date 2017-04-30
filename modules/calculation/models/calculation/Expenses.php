<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Expenses
 *
 * @author DartVadius
 */
class Expenses implements iCalculation {
    
    private $expenses;

    public function __construct($expenses) {
        $this->expenses = $expenses;
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->expenses)) {
            foreach ($this->expenses as $expense) {
                $summ += $expense['summ'];
            }
        }        
        return $summ;
    }
    public function count() {
        return count($this->expenses);
    }
    public function get() {
        return $this->expenses;
    }
}
