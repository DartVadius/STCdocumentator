<?php

namespace app\modules\product\controllers;
use yii\web\Controller;
use app\modules\product\models\ProductAggregator;
use app\modules\product\models\admin\Product;

/**
 * Description of IndexController
 *
 * @author Vad
 */
class IndexController extends Controller {
    public function actionIndex() {
        $product = new Product();
        $products = $product->findAll(['product_archiv' => 0]);
        return $this->render('index');
    }
}
