<?php

namespace app\controllers\admin;

use Yii;
use app\models\admin\Mr;
use app\models\admin\MrSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MrController implements the CRUD actions for Mr model.
 */
class MrController extends Controller {

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
     * Lists all Mr models.
     * @return mixed
     */
    public function actionIndex() {
        return $this->redirect(['admin/recipe/index']);
    }

    /**
     * Displays a single Mr model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($mr_recipe_id = NULL) {
        $model = new Mr();
        $model->mr_recipe_id = $mr_recipe_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $recipes = new \app\models\admin\Recipe();
            $recipe = $recipes->findOne($model->mr_recipe_id);
            $recipe->recipe_update = date('Y-m-d H:i:s');
            $recipe->save();
            return $this->redirect(['admin/recipe/view', 'id' => $model->mr_recipe_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $recipes = new \app\models\admin\Recipe();
            $recipe = $recipes->findOne($model->mr_recipe_id);
            $recipe->recipe_update = date('Y-m-d H:i:s');
            $recipe->save();
            return $this->redirect(['admin/recipe/view', 'id' => $model->mr_recipe_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $recipeId = $this->findModel($id)->mr_recipe_id;
        $this->findModel($id)->delete();
        $recipes = new \app\models\admin\Recipe();
        $recipe = $recipes->findOne($recipeId);
        $recipe->recipe_update = date('Y-m-d H:i:s');
        $recipe->save();
        return $this->redirect(['admin/recipe/view', 'id' => $recipeId]);
    }

    /**
     * Finds the Mr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Mr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Mr::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
