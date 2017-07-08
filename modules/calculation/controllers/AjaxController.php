<?php

namespace app\modules\calculation\controllers;

use app\modules\calculation\models\CalculationAggregator;
use Yii;
use yii\web\Controller;
use app\modules\classes\Connector;
use app\modules\calculation\models\admin\Calculation;
use app\modules\directory\models\Config;

/**
 * Description of AjaxController
 *
 * @author DartVadius
 */
class AjaxController extends Controller {

    public function actionGroupStatement() {
        if (Yii::$app->request->isAjax) {
            $config = new Config();
            $shift = $config->find()->where(['config_system_name' => 'shift_duration'])->one()->config_value;
            $post = urldecode(Yii::$app->request->post('data'));
            $c = [];
            parse_str($post, $c);
            $data = CalculationAggregator::findCalculationByCategoryIds($c['category']);
            $aggregat = [];
            foreach ($data as $group) {
                foreach ($group as $key => $calculations) {
                    foreach ($calculations as $calculation) {
                        $aggregat[$key][] = Connector::getCalculationAggregator($calculation);
                    }
                }
            }
//            print_r($aggregat);
//            die;
            return $this->renderAjax('@app/modules/calculation/views/partials/group-statement-partial', [
                        'data' => $aggregat,
                        'shift' => $shift,
            ]);
        }
    }

}
