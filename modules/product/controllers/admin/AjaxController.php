<?php

namespace app\modules\product\controllers\admin;

use Yii;
use yii\web\Controller;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Material;
use app\modules\product\models\admin\Category;
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

}
