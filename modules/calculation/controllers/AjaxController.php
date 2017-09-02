<?php

namespace app\modules\calculation\controllers;

use app\modules\calculation\models\CalculationAggregator;
use Yii;
use yii\web\Controller;
use app\modules\classes\Connector;
use app\modules\directory\models\Config;

/**
 * Description of AjaxController
 *
 * @author DartVadius
 */
class AjaxController extends Controller {

    public function actionPartial() {
        if (Yii::$app->request->isAjax) {
            $config = new Config();
            $shift = $config->find()->where(['config_system_name' => 'shift_duration'])->one()->config_value;
            $post = urldecode(Yii::$app->request->post('data'));
            $c = [];
            parse_str($post, $c);
            $data = CalculationAggregator::findCalculationByCategoryIds($c['category']);
            $aggregat = CalculationAggregator::findAggregatorByCategoryIds($data);
            $partial = $c['partial'];
            $discount = (!empty($c['discount'])) ? $c['discount'] : null;
            $profit = (!empty($c['profit'])) ? $c['profit'] : null;
            $step = (!empty($c['step'])) ? $c['step'] : null;
            $stepCount = (!empty($c['step-count'])) ? $c['step-count'] : null;
            return $this->renderAjax("@app/modules/calculation/views/partials/$partial", [
                        'data' => $aggregat,
                        'shift' => $shift,
                        'discount' => $discount,
                        'profit' => $profit,
                        'step' => $step,
                        'step_count' => $stepCount,
            ]);
        }
    }

    public function actionPartialStatisticPrimeCost() {
        if (Yii::$app->request->isAjax) {
            $post = urldecode(Yii::$app->request->post('data'));
            $c = $from = $to = [];
            parse_str($post, $c);
            $from['start'] = date_format(new \DateTime($c['from_date_start'] . ' 00:00:00'), 'Y-m-d H:i:s');
            $from['end'] = date_format(new \DateTime($c['to_date_start'] . ' 23:59:59'), 'Y-m-d H:i:s');
            $to['start'] = date_format(new \DateTime($c['from_date_end'] . ' 00:00:00'), 'Y-m-d H:i:s');
            $to['end'] = date_format(new \DateTime($c['to_date_end'] . ' 23:59:59'), 'Y-m-d H:i:s');
//            print_r($from);
            $aggregates = CalculationAggregator::findAggregatByPeriodAndCategory($c['category'], $from, $to);
            $partial = $c['partial'];
            return $this->renderAjax("@app/modules/calculation/views/partials/$partial", [
                        'data' => $aggregates,
                        'lastCalc' => $c['last-calc'],
                        'from' => date_format(new \DateTime($c['from_date_start']), 'd/m/Y') . ' - ' . date_format(new \DateTime($c['to_date_start']), 'd/m/Y'),
                        'to' => date_format(new \DateTime($c['from_date_end']), 'd/m/Y') . ' - ' . date_format(new \DateTime($c['to_date_end']), 'd/m/Y'),
            ]);
        }
    }

}
