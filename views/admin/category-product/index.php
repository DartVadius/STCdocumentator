<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cоздать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_product_id',
            'category_product_title',
            'category_product_desc',
            'category_product_img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
