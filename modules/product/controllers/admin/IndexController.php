<?php

namespace app\modules\product\controllers\admin;
use yii\web\Controller;

/**
 * Description of IndexController
 *
 * @author Vad
 */
class IndexController extends Controller {
    public function actionIndex() {
        return $this->render('index');
    }
}
