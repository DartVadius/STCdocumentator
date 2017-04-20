<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Op;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\admin\Product;

/**
 * OpController implements the CRUD actions for Op model.
 */
class OpController extends Controller {

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
     * Lists all Op models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Displays a single Op model.
     * @param string $id
     * @return mixed
     */
    public function actionView() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Creates a new Op model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($op_product_id = NULL) {
        $model = new Op();
        $model->op_product_id = $op_product_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->op_product_id);            
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->op_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Op model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->op_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->op_product_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Op model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        $products = new Product();
        $product = $products->findOne($model->op_product_id);
        $product->product_update = date('Y-m-d H:i:s');
        $product->save();
        return $this->redirect(['admin/product/view', 'id' => $model->op_product_id]);
    }

    /**
     * Finds the Op model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Op the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Op::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
