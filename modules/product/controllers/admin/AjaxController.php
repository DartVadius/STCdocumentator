<?php

namespace app\modules\product\controllers\admin;

use Yii;
use yii\web\Controller;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Material;
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
}
