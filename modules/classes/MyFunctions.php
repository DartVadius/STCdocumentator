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
    
    public static function setPageSize() {
        return (empty($_SESSION['page_size'])) ? 20 : $_SESSION['page_size'];
    }
}
