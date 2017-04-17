<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Sp;
use app\models\admin\SpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpController implements the CRUD actions for Sp model.
 */
class SpController extends Controller {

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
     * Lists all Sp models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Displays a single Sp model.
     * @param string $id
     * @return mixed
     */
    public function actionView() {
        return $this->redirect(['admin/product/index']);
    }

    /**
     * Creates a new Sp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($sp_product_id = NULL) {
        $model = new Sp();
        $model->sp_product_id = $sp_product_id;
        $model->getSolutionIds();
        if ($model->load(Yii::$app->request->post()) && $model->saveSps()) {
            return $this->redirect(['admin/product/view', 'id' => $model->sp_product_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }
//
//    /**
//     * Updates an existing Sp model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param string $id
//     * @return mixed
//     */
//    public function actionUpdate($id) {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->sp_id]);
//        } else {
//            return $this->render('update', [
//                        'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Sp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Sp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
