<?php

namespace app\modules\calculation\controllers;

use yii\web\Controller;
use app\modules\product\models\ProductAggregator;
use app\modules\product\models\admin\Product;
use app\modules\calculation\models\CalculationAggregator;
use app\modules\calculation\models\admin\Calculation;

class CalculationController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCreate($id_product = null) {
        $product = new Product();
        $calculation = new Calculation();
        $productAggregator = new ProductAggregator($product->findOne($id_product));
        $params = $productAggregator->getParams();
        $materials = $productAggregator->getMaterials();
        $recipe = $productAggregator->getRecipe();
        $packs = $productAggregator->getPacks();
        $positions = $productAggregator->getPositions();
        $expenses = $productAggregator->getExpenses();
        $losses = $productAggregator->getLosses();
        $calculationAggregator = new CalculationAggregator($params, $materials, $recipe, $packs, $positions, $expenses, $losses);
        $calculation->calculation_product_id = $calculationAggregator->params->product_id;
        $calculation->calculation_product_title = $calculationAggregator->params->title;
        $calculation->calculation_date = date('Y-m-d H:i:s');
        $calculation->calculation_product_capacity_hour = $calculationAggregator->params->capacity;
        $calculation->calculation_weight = $calculationAggregator->params->weight;
        $calculation->calculation_length = $calculationAggregator->params->length;
        $calculation->calculation_width = $calculationAggregator->params->width;
        $calculation->calculation_thickness = $calculationAggregator->params->thickness;
        $calculation->calculation_unit = $calculationAggregator->params->unit;
        $calculation->calculation_recipe_data = serialize($calculationAggregator->recipe);
        $calculation->calculation_materials_data = serialize($calculationAggregator->materials);
        $calculation->calculation_packs_data = serialize($calculationAggregator->packs);
        $calculation->calculation_positions_data = serialize($calculationAggregator->positions);
        $calculation->calculation_expenses_data = serialize($calculationAggregator->expenses);
        $calculation->calculation_losses_data = serialize($calculationAggregator->losses);
        if ($calculation->save()) {
            return $this->redirect(['view', 'id' => $calculation->calculation_id]);
        } else {
            return $this->redirect(['../product/admin/product/view', 'id' => $calculation->calculation_product_id]);
        }
    }

    public function actionView($id) {
        $calculation = $this->findModel($id);
        return $this->render('view', ['calculation' => $calculation]);
    }

    protected function findModel($id) {
        if (($model = Calculation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
