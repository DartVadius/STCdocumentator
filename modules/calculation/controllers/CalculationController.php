<?php

namespace app\modules\calculation\controllers;

use Yii;
use yii\web\Controller;
use app\modules\product\models\ProductAggregator;
use app\modules\product\models\admin\Product;
use app\modules\calculation\models\CalculationAggregator;
use app\modules\calculation\models\admin\Calculation;
use app\modules\calculation\models\admin\CalculationSearch;
use app\modules\product\models\admin\CategoryProduct;
use app\modules\classes\Connector;
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
        $msg = NULL;
        $productAggregator = new ProductAggregator($product->findOne($id_product));
        $calculationAggregator = Connector::getCalculationAggregator($productAggregator);
        $calculation = Connector::setCalculationModel($calculationAggregator);
        if (!$productAggregator->weight && !$productAggregator->recipe_weight) {
            $msg = 'Укажите вес продукции или вес герметика';
        }
        if ($calculation->load(Yii::$app->request->post()) && ($productAggregator->weight || $productAggregator->recipe_weight) && $calculation->save()) {
            return $this->redirect(['view', 'id' => $calculation->calculation_id]);
        } else {
            return $this->render('create', [
                        'calculation' => $calculation,
                        'msg' => $msg,
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
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionRecreate() {
        CalculationAggregator::recreateCalculations();
        return $this->redirect(['index']);
    }

    public function actionMenu() {
        return $this->render('menu');
    }

    public function actionConsolidatedStatement() {
        $aggregat = CalculationAggregator::findCalculationByCategoryId();
        $count = CalculationAggregator::findMaxPacksCount($aggregat);
        $data = CalculationAggregator::getDataForConsolidatedStatement($aggregat);
        return $this->render('consolidated-statement', [
                    'aggregat' => $data,
                    'pack_count' => $count,
        ]);
    }

    public function actionGroupStatement() {
        $categories = CategoryProduct::find()->asArray()->all();
        return $this->render('group-statement', [
                    'categories' => $categories,
        ]);
    }

    public function actionProfitability() {
        $categories = CategoryProduct::find()->asArray()->all();
        return $this->render('profitability', [
            'categories' => $categories,
        ]);
    }
    
    public function actionPricing() {
        $categories = CategoryProduct::find()->asArray()->all();
        return $this->render('pricing', [
            'categories' => $categories,
        ]);
    }
    
    public function actionPrimeCost() {
        $categories = CategoryProduct::find()->asArray()->all();
        return $this->render('prime-cost', [
            'categories' => $categories,
        ]);
    }

    protected function findModel($id) {
        if (($model = Calculation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
