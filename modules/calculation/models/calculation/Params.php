<?php

namespace app\modules\calculation\models\calculation;

/**
 * Description of Params
 *
 * @author DartVadius
 * 
 * @property integer $product_id
 * @property string $title
 * @property date $date
 * @property string $note
 * @property integer $capacity
 * @property integer $weight
 * @property integer $length
 * @property integer $width
 * @property integer $thickness
 * @property integer $unit
 * @property integer $calculation_archive
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
    private $thickness = NULL;
    private $unit = NULL;
    private $calculation_archive = NULL;

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
