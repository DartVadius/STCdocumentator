<?php

namespace app\modules\product\controllers\admin;

use Yii;
use app\modules\product\models\admin\Pma;
use app\modules\product\models\admin\PmaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\product\models\admin\Product;

/**
 * PmaController implements the CRUD actions for Pma model.
 */
class PmaController extends Controller {

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
     * Lists all Pma models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PmaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pma model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pma_product_id = NULL) {
        $model = new Pma();
        $model->pma_product_id = $pma_product_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pma_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->pma_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pma_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->pma_product_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['admin/product/view', 'id' => $model->pma_product_id]);
    }

    /**
     * Finds the Pma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Pma::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
