<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Product */

$this->title = $model->product_title;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_date',
            'product_update',
            'product_capacity_hour',
            [
                'attribute' => 'product_recipe_id',
                'label' => 'Рецептура',
                'value' => $model->productRecipe->recipe_title,
            ],
            [
                'attribute' => 'product_unit_id',
                'label' => 'Ед.учета',
                'value' => $model->productUnit->unit_title,
            ],
            [
                'attribute' => 'product_category_id',
                'label' => 'Категория',
                'value' => $model->productCategory->category_product_title,
            ],
            'product_price',
            'product_weight',
            'product_length',
            'product_width',
            'product_thickness',
            'product_note:ntext',
        ],
    ])
    ?>
    <p>
        <?= Html::a('Добавить материал', ['admin/pm/create', 'pm_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderPm,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'pm_material_id',
                'label' => 'Материал',
                'value' => 'pmMaterial.material_title'
            ],
            'pm_quantity',
            [
                'attribute' => 'pm_unit_id',
                'label' => 'Ед.учета',
                'value' => 'pmUnit.unit_title'
            ],
            'pm_square:boolean',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\pm',
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
</div>
