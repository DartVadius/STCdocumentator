<?php

namespace app\modules\calculation\controllers;

use yii\web\Controller;
use app\modules\product\models\ProductAggregator;
use app\modules\product\models\admin\Product;
use app\modules\calculation\models\CalculationAggregator;

class CalculationController extends Controller {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionCreate($id_product = null) {
        $product = new Product();
        $productAggregator = new ProductAggregator($product->findOne(1));
        $params = $productAggregator->getParams();
        $materials = $productAggregator->getMaterials();
        $calculationAggregator = new CalculationAggregator($params, $materials);
        print_r($calculationAggregator->materials->summ());
        die();
    }

}
