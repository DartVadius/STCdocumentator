<?php

namespace app\modules\product\controllers\admin;

use Yii;
use app\modules\product\models\admin\Pap;
use app\modules\product\models\admin\PapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\product\models\admin\Product;

/**
 * PapController implements the CRUD actions for Pap model.
 */
class PapController extends Controller {

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
     * Lists all Pap models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pap model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pap_product_id = NULL) {
        $model = new Pap();
        $model->pap_product_id = $pap_product_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pap_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->pap_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pap_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->pap_product_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {        
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['admin/product/view', 'id' => $model->pap_product_id]);
    }

    /**
     * Finds the Pap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Pap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
