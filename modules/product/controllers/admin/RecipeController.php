<?php

namespace app\modules\product\controllers\admin;

use Yii;
use app\modules\product\models\admin\Recipe;
use app\modules\product\models\admin\RecipeSearch;
use app\modules\product\models\admin\Mr;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends Controller {

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
     * Lists all Recipe models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RecipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipe model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider(['query' => $model->getMrs()->with('mrMaterial')]);
        $total = $model->getMrs()->with('mrMaterial')->sum('mr_percentage');
        if (empty($total)) {
            $total = '0';
        }
        return $this->render('view', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'total' => $total,
        ]);
    }

    /**
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Recipe();
        if ($model->load(Yii::$app->request->post())) {
            $model->recipe_date = date('Y-m-d H:i:s');
            $model->recipe_update = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->recipe_id]);
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
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            //$model->recipe_update = date('Y-m-d H:i:s');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->recipe_id]);
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
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->getProducts()->count() > 0) {
            $product = $model->getProducts()->select('product_title')->asArray()->all();
            $prod = NULL;
            foreach ($product as $value) {
                $prod .= $value['product_title'] . ', ';
            }
            $prod[strlen($prod) - 2] = '';
            $dataProvider = new ActiveDataProvider(['query' => $model->getMrs()->with('mrMaterial')]);
            $total = $model->getMrs()->with('mrMaterial')->sum('mr_percentage');
            if (empty($total)) {
                $total = '0';
            }
            return $this->render('view', [
                        'model' => $model,
                        'dataProvider' => $dataProvider,
                        'product' => trim($prod),
                        'total' => $total,
            ]);
        }
        Mr::deleteAll('mr_recipe_id = :id', [':id' => $id]);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
