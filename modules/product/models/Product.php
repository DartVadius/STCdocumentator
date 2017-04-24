<?php

namespace app\modules\product\models;

use Yii;
use app\modules\product\models\admin\Product;

/**
 * Description of Product
 *
 * @author Vad
 */
class ProductAggregator {

    protected $id;
    protected $title;
    protected $capacity;
    protected $unit; //object
    protected $price;
    protected $category; //object
    protected $weight;
    protected $length;
    protected $width;
    protected $square;
    protected $thickness;
    protected $note;
    protected $recipe; //object 
    protected $vendorCode;
    protected $archive = 0;
    protected $createDate;
    protected $updateDate;
    protected $parameters = [];
    protected $materials = [];
    protected $pack = [];
    protected $solutions = [];
    protected $positions = [];
    protected $expenses = [];
    protected $losses = [];
    protected $files = [];

    public function __construct(Product $product) {
        $this->id = $product->product_id;
        $this->title = $product->product_title;
        $this->capacity = $product->product_capacity_hour;
        $this->unit = $product->productUnit;
        $this->price = $product->product_price;
        $this->category = $product->productCategory;
        $this->weight = $product->product_weight;
        $this->length = $product->product_length;
        $this->width = $product->product_width;
        $this->square = $this->setSquare();
        $this->thickness = $product->product_thickness;
        $this->note = $product->product_note;
        $this->recipe = $product->productRecipe;
    }

    protected function setSquare() {
        if (!empty($this->length) && !empty($this->width)) {
            $this->square = $this->length * $this->width;
        } else {
            $this->square = NULL;
        }
    }

    protected function squareRatio() {
        return 1 / $this->square;
    }

    public function __get($name) {
        if (!empty($this->$name)) {
            return $this->$name;
        }
        return FALSE;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getUnit() {
        return $this->unit;
    }

}
