<?php

namespace app\modules\product\controllers\admin;

use Yii;
use yii\web\Controller;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Material;
use app\modules\product\models\admin\Category;
use app\modules\product\models\admin\Pack;
use yii\web\Response;

/**
 * Description of AjaxController
 *
 * @author DartVadius
 */
class AjaxController extends Controller {

    public function actionUnitList() {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if ($post['material_id']) {
                $material = new Material();
                $materialById = $material->find()->where(['material_id' => $post['material_id']])->one();
                $unit = Unit::findUnitByType($materialById->material_unit_id);
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['unit' => $unit];
            }
        }
    }

    public function actionMaterialList() {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $material = new Material();
            $materialById = NULL;
            if ($post['category_id']) {
                $materialById = $material->find()->where(['material_category_id' => $post['category_id']])->all();
            } elseif ($post['category_id'] == '0') {
                $materialById = $material->find()->where(['material_category_id' => NULL])->all();
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['material' => $materialById];
        }
    }
    
    public function actionPackList() {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $pack = new Pack();
            $packById = NULL;
            if ($post['category_id']) {
                $packById = $pack->find()->where(['pack_category_id' => $post['category_id']])->all();
            } elseif ($post['category_id'] == '0') {
                $packById = $pack->find()->where(['pack_category_id' => NULL])->all();
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['pack' => $packById];
        }
    }
    
    public function actionQuickSave() {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $table = "\app\modules\product\models\admin\\" . trim($post['table']);
            $tableModel = new $table();
            $model = $tableModel->findOne($post['id']);
            foreach ($post['values'] as $key => $value) {
                if (empty($value) || is_numeric($value)) {
                    $model->$key = $value;
                } 
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['res' => $model->update()];
        }
    }

}
