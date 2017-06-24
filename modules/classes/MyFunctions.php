<?php

namespace app\modules\classes;

/**
 * Description of myFunctions
 *
 * @author DartVadius
 */
class MyFunctions {
    public static function plusPercent($val, $percent) {
        return ($val + $val / 100 * $percent);
    }
}
