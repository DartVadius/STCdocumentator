<?php

namespace app\modules\calculation\controllers;

use Yii;
use yii\web\Controller;
use app\modules\product\models\ProductAggregator;
use app\modules\product\models\admin\Product;
use app\modules\calculation\models\CalculationAggregator;
use app\modules\calculation\models\admin\Calculation;
use app\modules\calculation\models\admin\CalculationSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;

class CalculationController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        $searchModel = new CalculationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
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
        $calculation->calculation_packs_data = serialize($calculationAggregator->packs);
        $calculation->calculation_positions_data = serialize($calculationAggregator->positions);
        $calculation->calculation_expenses_data = serialize($calculationAggregator->expenses);
        $calculation->calculation_losses_data = serialize($calculationAggregator->losses);
        if ($calculation->load(Yii::$app->request->post()) && $calculation->save()) {
            return $this->redirect(['view', 'id' => $calculation->calculation_id]);
        } else {
            return $this->render('create', [
                        'calculation' => $calculation,
            ]);
        }
    }
    
    public function actionUpdate($id) {
        $calculation = $this->findModel($id);
        if ($calculation->load(Yii::$app->request->post()) && $calculation->save()) {
            return $this->redirect(['view', 'id' => $calculation->calculation_id]);
        } else {
            return $this->render('update', [
                        'calculation' => $calculation,
            ]);
        }
    }

    public function actionView($id) {
        $calculation = $this->findModel($id);
        return $this->render('view', ['calculation' => $calculation]);
    }

    public function actionDelete($id) {
        $model = $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Calculation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
