<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\admin\CategoryProduct;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_title',
//            'product_capacity_hour',
            'product_date',
            'product_update',
//            'product_unit_id',
//            'product_price',
            [
                'attribute' => 'product_category_id',
                'label' => 'Категория',
                'value' => 'productCategory.category_product_title',
                'filter' => CategoryProduct::find()->select(['category_product_title', 'category_product_id'])->indexBy('category_product_id')->column(),
            ],            
//            'product_weight',
//            'product_length',
//            'product_width',
//            'product_thickness',
//            'product_note',
//            'product_recipe_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
