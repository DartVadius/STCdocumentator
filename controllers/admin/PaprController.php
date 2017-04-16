<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Papr;
use app\models\admin\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaprController implements the CRUD actions for Papr model.
 */
class PaprController extends Controller {

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
     * Lists all Papr models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Displays a single Papr model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Papr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($papr_product_id = NULL) {
        $model = new Papr();
        $model->papr_product_id = $papr_product_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->papr_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->papr_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Papr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $products = new Product();
            $product = $products->findOne($model->papr_product_id);
            $product->product_update = date('Y-m-d H:i:s');
            $product->save();
            return $this->redirect(['admin/product/view', 'id' => $model->papr_product_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Papr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['admin/product/view', 'id' => $model->papr_product_id]);
    }

    /**
     * Finds the Papr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Papr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Papr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
