<?php

namespace app\modules\calculation\models;

/**
 * Description of Params
 *
 * @author DartVadius
 */
class Params {

    private $product_id = NULL;
    private $title = NULL;
    private $date = NULL;
    private $note = NULL;
    private $capacity = NULL;
    private $weight = NULL;
    private $length = NULL;
    private $width = NULL;
    private $unit = NULL;

    public function __construct($params) {
        foreach ($params as $key => $value) {
            if ($this->$key === NULL) {
                $this->$key = $value;
            }
        }
    }

    public function __get($name) {
        if (!empty($this->$name)) {
            return $this->$name;
        }
        return FALSE;
    }

}
