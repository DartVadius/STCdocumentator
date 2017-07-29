<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\product\models\admin\CategoryProduct;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 product-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Добавить Продукт', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Product',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'product_title',
                [
                    'attribute' => 'product_category_id',
                    'label' => 'Категория',
                    'value' => 'productCategory.category_product_title',
                    'filter' => CategoryProduct::find()->select(['category_product_title', 'category_product_id'])->indexBy('category_product_id')->column(),
                ],
                [
                    'attribute' => 'product_price',
                    'label' => 'Цена прайсовая',
                    'value' => 'product_price',
                    'contentOptions' => ['data-field' => 'product_price'],
                ],
                [
                    'attribute' => 'product_capacity_hour',
                    'label' => 'Выработка',
                    'value' => 'product_capacity_hour',
                    'contentOptions' => ['data-field' => 'product_capacity_hour'],
                ],
                'product_date',
                'product_update',
                [
                    'attribute' => 'product_archiv',
                    'label' => 'Архив',
                    'value' => function ($model) {
                        if ($model->product_archiv === 0) {
                            return 'нет';
                        }
                        return 'да';
                    },
                    'filter' => ['нет', 'да'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '100'],
                    'template' => '{view}&nbsp;&nbsp;{delete}',
                ],
            ],
        ]);
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>