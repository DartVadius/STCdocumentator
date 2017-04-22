<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Pop;
use app\models\admin\PopSearch;
use app\models\admin\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PopController implements the CRUD actions for Pop model.
 */
class PopController extends Controller {

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
     * Lists all Pop models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Displays a single Pop model.
     * @param string $id
     * @return mixed
     */
    public function actionView() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Creates a new Pop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pop_product_id) {
        $model = new Pop();
        $model->pop_product_id = $pop_product_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pop_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->pop_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->pop_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            return $this->redirect(['admin/product/view', 'id' => $model->pop_product_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Pop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
