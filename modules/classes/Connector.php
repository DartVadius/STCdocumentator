<?php

namespace app\modules\classes;

use app\modules\product\models\ProductAggregator;
use app\modules\calculation\models\CalculationAggregator;
use app\modules\calculation\models\admin\Calculation;

class Connector {

    public static function getCalculationAggregator($product) {
        if ($product instanceof ProductAggregator) {
            $params = $product->getParams();
            $materials = $product->getMaterials();
            $materialsAdditional = $product->getMaterialsAdditional();
            $recipe = $product->getRecipe();
            $packs = $product->getPacks();
            $positions = $product->getPositions();
            $expenses = $product->getExpenses();
            $losses = $product->getLosses();
            return new CalculationAggregator($params, $materials, $materialsAdditional, $recipe, $packs, $positions, $expenses, $losses);
        } elseif ($product instanceof Calculation) {
            return self::getOne($product);
        } elseif (is_array($product)) {
            $data = [];
            foreach ($product as $val) {
                $data[] = self::getOne($val);
            }
            return $data;
        }
    }
    
    private static function getOne($product) {
        $params['product_id'] = $product->calculation_product_id;
            $params['title'] = $product->calculation_product_title;
            $params['capacity'] = $product->calculation_product_capacity_hour;
            $params['date'] = $product->calculation_date;
            $params['note'] = $product->calculation_note;
            $params['weight'] = $product->calculation_weight;
            $params['length'] = $product->calculation_length;
            $params['width'] = $product->calculation_width;
            $params['thickness'] = $product->calculation_thickness;
            $params['unit'] = $product->calculation_unit;
            $params['calculation_archive'] = $product->calculation_archive;
            $materialsData = unserialize($product->calculation_materials_data);
            $materials = NULL;
            if (!empty($materialsData)) {
                $materials = $materialsData->get();
            }
            $materialsAdditionalData = unserialize($product->calculation_materials_additional_data);
            $materialsAdditional = NULL;
            if (!empty($materialsAdditionalData)) {
                $materialsAdditional = $materialsAdditionalData->get();
            }
            $recipeData = unserialize($product->calculation_recipe_data);
            $recipe = [];
            if (!empty($recipeData)) {
                $recipe['title'] = $recipeData->getTitle();
                $recipe['materials'] = $recipeData->get();
                $recipe['loss'] = $recipeData->getLoss();
            }
            $packsData = unserialize($product->calculation_packs_data);
            $packs = NULL;
            if (!empty($packsData)) {
                $packs = $packsData->get();
            }
            $positionsData = unserialize($product->calculation_positions_data);
            $positions = NULL;
            if (!empty($positionsData)) {
                $positions = $positionsData->get();
            }
            $expensesData = unserialize($product->calculation_expenses_data);
            $expenses = NULL;
            if (!empty($expensesData)) {
                $expenses = $expensesData->get();
            }
            $lossesData = unserialize($product->calculation_losses_data);
            $losses = NULL;
            if (!empty($lossesData)) {
                $losses = $lossesData->get();
            }
            $calculationAggregator = new CalculationAggregator($params, $materials, $materialsAdditional, $recipe, $packs, $positions, $expenses, $losses);
            $calculationAggregator->setId($product->calculation_id);
            return $calculationAggregator;
    }

    public static function setCalculationModel(CalculationAggregator $calculationAggregator) {
        $calculation = new Calculation();
        $calculation->calculation_product_title = $calculationAggregator->params->title;
        $calculation->calculation_product_id = $calculationAggregator->params->product_id;
        $calculation->calculation_date = date('Y-m-d H:i:s');
        $calculation->calculation_product_capacity_hour = $calculationAggregator->params->capacity;
        $calculation->calculation_weight = $calculationAggregator->params->weight;
        $calculation->calculation_length = $calculationAggregator->params->length;
        $calculation->calculation_width = $calculationAggregator->params->width;
        $calculation->calculation_thickness = $calculationAggregator->params->thickness;
        $calculation->calculation_unit = $calculationAggregator->params->unit;
        $calculation->calculation_recipe_data = serialize($calculationAggregator->recipe);
        $calculation->calculation_materials_data = serialize($calculationAggregator->materials);
        $calculation->calculation_materials_additional_data = serialize($calculationAggregator->materialsAdditional);
        $calculation->calculation_packs_data = serialize($calculationAggregator->packs);
        $calculation->calculation_positions_data = serialize($calculationAggregator->positions);
        $calculation->calculation_expenses_data = serialize($calculationAggregator->expenses);
        $calculation->calculation_losses_data = serialize($calculationAggregator->losses);
        $calculation->calculation_archive = $calculationAggregator->params->calculation_archive;
        return $calculation;
    }

}
