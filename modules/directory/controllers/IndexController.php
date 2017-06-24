<?php
namespace app\modules\directory\controllers;

use yii\web\Controller;
use app\modules\directory\models\Config;

/**
 * Description of ConfigController
 *
 * @author DartVadius
 */
class IndexController extends Controller {
    public function actionConfig() {
        $config = new Config();
        $values = $config->find()->all();
        return $this->render('config', [
                    'config' => $values,
        ]);
    }
    
    public function actionSave() {        
        $values = \Yii::$app->request->post();
        foreach ($values['value'] as $key => $value) {
            $model = Config::findOne($key);
            $model->config_value = $value;
            $model->update();
        }
        return $this->redirect('/directory/index/config');
    }
}
