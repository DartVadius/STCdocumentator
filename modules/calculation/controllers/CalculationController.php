<?php

namespace app\modules\calculation\controllers;

use yii\web\Controller;

class CalculationController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}
