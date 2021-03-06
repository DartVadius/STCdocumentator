<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Packs
 *
 * @author DartVadius
 */
class Packs implements iCalculation {

    private $packs;

    public function __construct($packs) {
        $this->packs = $packs;
    }

    public function summ() {
        $summ = 0;
        if (!empty($this->packs)) {
            foreach ($this->packs as $pack) {
                $summ += $pack['value'];
            }
        }
        return $summ;
    }

    public function count() {
        return count($this->packs);
    }

    public function get() {
        return $this->packs;
    }

    public function sortPacksByCapacity() {
        if (empty($this->packs)) {
            return FALSE;
        }
        $sort = [];
        foreach ($this->packs as $pack) {
            $sort[(int) $pack['capacity']] = $pack;
        }
        ksort($sort);
        $this->packs = $sort;
    }

}
