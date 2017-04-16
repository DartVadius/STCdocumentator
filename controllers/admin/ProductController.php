<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Product;
use app\models\admin\ProductSearch;
use app\models\admin\Pm;
use app\models\admin\Pap;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $dataProviderPm = new ActiveDataProvider(['query' => $model->getPms()->with('pmMaterial')]);
        $dataProviderPap = new ActiveDataProvider(['query' => $model->getPaps()->with('papPack')]);
        $dataProviderPapr = new ActiveDataProvider(['query' => $model->getPaprs()->with('paprParameter')]);
        $dataProviderSp = new ActiveDataProvider(['query' => $model->getSps()->with('spSolution')]);
        return $this->render('view', [
                    'model' => $model,
                    'dataProviderPm' => $dataProviderPm,
                    'dataProviderPap' => $dataProviderPap,
                    'dataProviderPapr' => $dataProviderPapr,
                    'dataProviderSp' => $dataProviderSp,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            $model->product_date = date('Y-m-d H:i:s');
            $model->product_update = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->product_id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->product_update = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->product_id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        Pm::deleteAll('pm_product_id = :id', [':id' => $id]);
        Pap::deleteAll('pap_product_id = :id', [':id' => $id]);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
