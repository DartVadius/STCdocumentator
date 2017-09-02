<?php

namespace app\modules\product\controllers;

use yii\web\Controller;
use app\modules\product\models\admin\Product;
use app\modules\product\models\ProductAggregator;
use yii\data\Pagination;

/**
 * Description of IndexController
 *
 * @author Vad
 */
class IndexController extends Controller {

    public function actionIndex($id = NULL) {
        $product = new Product();
        $query = $product->find()->where(['product_archiv' => 0]);
        if ($id) {
            $query->andWhere(['product_category_id' => $id]);
        }
        if ($id === '0') {
            $query->andWhere(['product_category_id' => '']);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => \Yii::$app->params['page_size']]);
        $pages->pageSizeParam = false;
        $products = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();        
        return $this->render('index', [
                    'products' => $products,
                    'pages' => $pages,
        ]);
    }
    
    public function actionView($id) {
        $product = new Product();
        $productAggregator = new ProductAggregator($product->findOne($id));
        return $this->render('view', ['product' => $productAggregator]);
    }
    
    public function actionPdf($id) {
        $product = new Product();
        $productAggregator = new ProductAggregator($product->findOne($id));
        $productAggregator->getTechMap();
    }
}
