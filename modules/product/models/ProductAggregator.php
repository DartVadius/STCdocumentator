<?php

namespace app\modules\product\models;

use Yii;
use app\modules\product\models\admin\Product;
use app\modules\product\models\admin\Pm;

/**
 * Description of ProductAggregator
 *
 * @author DartVadius
 * 
 * @property string $id
 * @property string $title
 * @property string $capacity
 * @property string $price
 * @property string $weight
 * @property string $length
 * @property string $width
 * @property string $square
 * @property string $thickness
 * @property string $note
 * @property string $vendorCode
 * @property string $archive
 *
 * @property Unit $unit
 * @property CategoryProduct $category
 * @property array $materials           array of Pm objects
 * @property array $packs               array of Pap objects
 * @property array $solutions
 * @property array $positions           array of Pop objects
 * @property array $expenses            array of Op objects
 * @property array $losses              array of Lp objects
 * @property array $parameters          array of Papr objects
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
    private $materialsAdditional = [];
    private $packs = [];
    private $solutions = [];
    private $positions = [];
    private $expenses = [];
    private $losses = [];
    private $tech_map;
    private $tech_desc;

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
        $this->materialsAdditional = $product->pmas;
        $this->packs = $product->paps;
        $this->solutions = $product->sps;
        $this->positions = $product->pops;
        $this->expenses = $product->ops;
        $this->losses = $product->lps;
        $this->tech_map = $product->product_tech_map;
        $this->tech_desc = $product->product_tech_desc;
    }

    /**
     * calculate square of product (sq.m.)
     */
    private function setSquare() {
        if (!empty($this->length) && !empty($this->width)) {
            $this->square = ($this->length / 1000) * ($this->width / 1000);
        } else {
            $this->square = NULL;
        }
    }

    public function __get($name) {
        if (!empty($this->$name)) {
            return $this->$name;
        }
        return FALSE;
    }

    public function __unset($name) {
        unset($this->$name);
    }

//    public function __set($name, $value) {
//        if ($this->$name) {
//            $this->$name = $value;
//            return TRUE;
//        }
//        return FALSE;
//    }

    /**
     * get base params of product
     * 
     * @return array
     */
    public function getParams() {
        $params['product_id'] = $this->id;
        $params['title'] = $this->title;
        $params['capacity'] = $this->capacity;
        $params['date'] = $this->updateDate;
        $params['note'] = $this->note;
        $params['weight'] = $this->weight;
        $params['length'] = $this->length;
        $params['width'] = $this->width;
        $params['thickness'] = $this->thickness;
        $params['unit'] = $this->unit->unit_title;
        return $params;
    }

    /**
     * get the basic materials of the product which ones is not in the recipe
     * 
     * @return array
     */
    public function getMaterials() {
        $unitModel = new admin\Unit();
        $materials = [];
        foreach ($this->materials as $material) {
            $currencyRatio = 1;
            if (!empty($material->pmMaterial->materialCurrencyType->currency_value)) {
                $currencyRatio = $material->pmMaterial->materialCurrencyType->currency_value;
            }
            $delivery = 1;
            if (!empty($material->pmMaterial->material_delivery)) {
                $delivery += $material->pmMaterial->material_delivery / 100;
            }
            $materials[$material->pm_material_id]['title'] = $material->pmMaterial->material_title;
            $materials[$material->pm_material_id]['unit'] = 'кг';
            $materials[$material->pm_material_id]['price'] = $material->pmMaterial->material_price * $currencyRatio * $delivery /
                    $material->pmMaterial->materialUnit->unit_ratio * 1000;
            $unit = $unitModel->findOne($material->pm_unit_id);
            $ratio = $unit->unit_ratio;
            $materials[$material->pm_material_id]['quantity'] = $this->calcQuantity($material) * $ratio / 1000;
            $materials[$material->pm_material_id]['summ'] = $materials[$material->pm_material_id]['price'] *
                    $materials[$material->pm_material_id]['quantity'];
            if (!empty($material->pm_loss)) {
                $materials[$material->pm_material_id]['loss'] = $material->pm_loss;
            } else {
                $materials[$material->pm_material_id]['loss'] = 0;
            }
        }
        return $materials;
    }

    public function getMaterialsAdditional() {
        $unitModel = new admin\Unit();
        $materials = [];
        foreach ($this->materialsAdditional as $material) {
            $currencyRatio = 1;
            if (!empty($material->pmaMaterial->materialCurrencyType->currency_value)) {
                $currencyRatio = $material->pmaMaterial->materialCurrencyType->currency_value;
            }
            $delivery = 1;
            if (!empty($material->pmaMaterial->material_delivery)) {
                $delivery += $material->pmaMaterial->material_delivery / 100;
            }
            $materials[$material->pma_material_id]['title'] = $material->pmaMaterial->material_title;
            $materials[$material->pma_material_id]['unit'] = $material->pmaUnit->unit_title;

            $unit = $unitModel->findOne($material->pma_unit_id);
            $ratio = $unit->unit_ratio;

            $materials[$material->pma_material_id]['price'] = $material->pmaMaterial->material_price *
                    $currencyRatio * $delivery /
                    $material->pmaMaterial->materialUnit->unit_ratio * $ratio;

            $materials[$material->pma_material_id]['quantity'] = $material->pma_quantity;
            $materials[$material->pma_material_id]['summ'] = $materials[$material->pma_material_id]['price'] *
                    $materials[$material->pma_material_id]['quantity'];
            if (!empty($material->pma_loss)) {
                $materials[$material->pma_material_id]['loss'] = $material->pma_loss;
            } else {
                $materials[$material->pma_material_id]['loss'] = 0;
            }
        }
        return $materials;
    }

    /**
     * get sealant weight in gramms
     * 
     * @return int|boolean
     */
    private function getRecipeWeight() {
        $weightOther = 0;
        if (empty($this->weight)) {
            return FALSE;
        }
        foreach ($this->materials as $material) {
            $weightOther += $material->pmUnit->unit_ratio * $this->calcQuantity($material);
        }
        return $this->weight - $weightOther;
    }

    /**
     * get quantity of supporting materials in current material
     * 
     * @param Pm $material
     * @return boolean|int
     */
    private function calcQuantity(Pm $material) {
        if (!$material->pm_square) {
            return $material->pm_quantity;
        }
        if (!empty($this->square)) {
            return $this->square * $material->pm_quantity;
        }
        return FALSE;
    }

    /**
     * get the basic materials of the product in the recipe
     * materials key is material ID
     * 
     * @return array
     */
    public function getRecipe() {
        $recipe = [];
        $recipe['title'] = $this->recipe->recipe_title;
        if (empty($this->recipe->mrs)) {
            return NULL;
        }
        foreach ($this->recipe->mrs as $material) {
            $currencyRatio = 1;
            if (!empty($material->mrMaterial->materialCurrencyType->currency_value)) {
                $currencyRatio = $material->mrMaterial->materialCurrencyType->currency_value;
            }
            $delivery = 1;
            if (!empty($material->mrMaterial->material_delivery)) {
                $delivery += $material->mrMaterial->material_delivery / 100;
            }
            $recipe['materials'][$material->mrMaterial->material_id]['title'] = $material->mrMaterial->material_title;
            $recipe['materials'][$material->mrMaterial->material_id]['unit'] = 'кг';
            $recipe['materials'][$material->mrMaterial->material_id]['%'] = $material->mr_percentage;
            $recipe['materials'][$material->mrMaterial->material_id]['quantity'] = $this->getRecipeWeight() *
                    $material->mr_percentage / 100 / 1000;
            $recipe['materials'][$material->mrMaterial->material_id]['price'] = $material->mrMaterial->material_price * $currencyRatio * $delivery /
                    $material->mrMaterial->materialUnit->unit_ratio * 1000;
            $recipe['materials'][$material->mrMaterial->material_id]['summ'] = $recipe['materials'][$material->mrMaterial->material_id]['price'] *
                    $recipe['materials'][$material->mrMaterial->material_id]['quantity'];
        }
        return $recipe;
    }

    /**
     * get details of packaging material
     * 
     * @return array
     */
    public function getPacks() {
        $packs = [];
        foreach ($this->packs as $pack) {
            $packs[$pack->papPack->pack_id]['title'] = $pack->papPack->pack_title;
            $packs[$pack->papPack->pack_id]['capacity'] = $pack->pap_capacity;
            $packs[$pack->papPack->pack_id]['price'] = $pack->papPack->pack_price;
            $packs[$pack->papPack->pack_id]['value'] = $pack->papPack->pack_price / $pack->pap_capacity;
        }
        return $packs;
    }

    /**
     * receive details of positions
     * 
     * @return array
     */
    public function getPositions() {
        $positions = [];
        foreach ($this->positions as $position) {
            $positions[$position->pop_position_id]['title'] = $position->popPosition->position_title;
            $positions[$position->pop_position_id]['quantity'] = $position->pop_num;
            $positions[$position->pop_position_id]['value_per_hour'] = $position->popPosition->position_salary_hour;
            $positions[$position->pop_position_id]['summ'] = $positions[$position->pop_position_id]['value_per_hour'] /
                    $this->capacity * $positions[$position->pop_position_id]['quantity'];
        }
        return $positions;
    }

    /**
     * get other expenses
     * 
     * @return array
     */
    public function getExpenses() {
        $expenses = [];
        foreach ($this->expenses as $expense) {
            $expenses[$expense->opOther->other_expenses_id]['title'] = $expense->opOther->other_expenses_title;
            $expenses[$expense->opOther->other_expenses_id]['value_per_hour'] = $expense->op_cost_hour;
            $expenses[$expense->opOther->other_expenses_id]['summ'] = $expenses[$expense->opOther->other_expenses_id]['value_per_hour'] /
                    $this->capacity;
        }
        return $expenses;
    }

    public function getLosses() {
        $losses = [];
        foreach ($this->losses as $loss) {
            $losses[$loss->lpLoss->loss_id]['title'] = $loss->lpLoss->loss_title;
            $losses[$loss->lpLoss->loss_id]['%'] = $loss->lp_percentage;
        }
        return $losses;
    }

    public function getTechMap() {

        if (file_exists($this->tech_map)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            echo file_get_contents($this->tech_map);
            exit();
        }
    }

}
