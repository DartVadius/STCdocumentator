<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Losses
 *
 * @author DartVadius
 */
class Losses implements iCalculation {

    private $losses;
    private $summ;

    public function __construct($losses, $summ) {
        $this->losses = $losses;
        $this->summ = $summ;
    }

    /**
     * summ of losses
     * 
     * @return string
     */
    public function summ() {
        $summ = 0;
        if (!empty($this->losses)) {
            foreach ($this->losses as $loss) {                
                $summ += $this->summ / 100 * $loss['%'];
            }
        }
        return $summ;
    }

    public function count() {
        return count($this->losses);
    }

    public function get() {
        $losses = [];
        if (!empty($this->losses)) {
            foreach ($this->losses as $key => $loss) {
                $losses[$key]['title'] = $loss['title'];
                $losses[$key]['%'] = $loss['%'];
                $losses[$key]['summ'] = $this->summ / 100 * $loss['%'];
            }
        }
        return $losses;
    }
    
    /**
     * summ of real expenses without losses
     * 
     * @return string
     */
    public function getSumm() {
        return $this->summ;
    }
    
    /**
     * get total % of losses
     * 
     * @return string
     */
    public function lossesTotal() {
        $losses = 0;
        if (!empty($this->losses)) {
            foreach ($this->losses as $loss) {
                $losses += $loss['%'];
            }
        }
        return $losses;
    }

}
