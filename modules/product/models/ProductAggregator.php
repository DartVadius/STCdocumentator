<?php

namespace app\modules\product\models;

use Yii;
use app\modules\product\models\admin\Product;

/**
 * Description of Product
 *
 * @author DartVadius
 */
class ProductAggregator {

    private $id;
    private $title;
    private $capacity;
    private $unit; //object
    private $price;
    private $category; //object
    private $weight;
    private $length;
    private $width;
    private $square;
    private $thickness;
    private $note;
    private $recipe; //object
    private $vendorCode;
    private $archive;
    private $createDate;
    private $updateDate;
    private $parameters = [];
    private $materials = [];
    private $pack = [];
    private $solutions = [];
    private $positions = [];
    private $expenses = [];
    private $losses = [];
    private $files = [];

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
        $this->setSquare();
        $this->thickness = $product->product_thickness;
        $this->note = $product->product_note;
        $this->recipe = $product->productRecipe;
        $this->vendorCode = $product->product_vendor_code;
        $this->archive = $product->product_archiv;
        $this->createDate = $product->product_date;
        $this->updateDate = $product->product_update;
        $this->parameters = $product->paprs;
        $this->materials = $product->pms;
        $this->pack = $product->paps;
        $this->solutions = $product->sps;
        $this->positions = $product->pops;
        $this->expenses = $product->ops;
        $this->losses = $product->lps;
        /**
         * @todo files
         */
        // $this->files =
    }

    private function setSquare() {
        if (!empty($this->length) && !empty($this->width)) {
            $this->square = ($this->length /1000) * ($this->width / 1000);
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

    public function getParams() {
        $params['product_id'] = $this->id;
        $params['title'] = $this->title;
        $params['capacity'] = $this->capacity;
        $params['date'] = $this->updateDate;
        $params['note'] = $this->note;
        $params['weight'] = $this->weight;
        $params['length'] = $this->length;
        $params['width'] = $this->width;
        $params['unit'] = $this->unit->unit_title;
        return $params;
    }
    
    public function getMaterials() {
        $materials = [];
        foreach ($this->materials as $material) {
            $materials[$material->pm_material_id]['title'] = $material->pmMaterial->material_title;
            $materials[$material->pm_material_id]['unit'] = $material->pmUnit->unit_title;
            $materials[$material->pm_material_id]['price'] = $material->pmMaterial->material_price / 
                    $material->pmMaterial->materialUnit->unit_ratio * $material->pmUnit->unit_ratio;
            $materials[$material->pm_material_id]['quantity'] = $material->pm_quantity;
            $materials[$material->pm_material_id]['summ'] = $materials[$material->pm_material_id]['price'] *
                    $materials[$material->pm_material_id]['quantity'];
        }
        return $materials;
    }








//    public function getId() {
//        return $this->id;
//    }
//
//    public function getTitle() {
//        return $this->title;
//    }
//
//    public function getCapacity() {
//        return $this->capacity;
//    }
//
//    public function getUnit() {
//        return $this->unit;
//    }

}
