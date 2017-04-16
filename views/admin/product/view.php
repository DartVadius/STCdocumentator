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
    <h6 class="small">Создан: <?= $model->product_date ?></h6>
    <h6 class="small">Отредактирован: <?= $model->product_update ?></h6>
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
            'product_capacity_hour',
            [
                'attribute' => 'product_recipe_id',
                'label' => 'Рецептура',
                'value' => $model->productRecipe->recipe_title,
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
            [
                'attribute' => 'product_unit_id',
                'label' => 'Ед.учета',
                'value' => $model->productUnit->unit_title,
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
            [
                'attribute' => 'product_category_id',
                'label' => 'Категория',
                'value' => $model->productCategory->category_product_title,
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
            'product_price',
            'product_weight',
            'product_length',
            'product_width',
            'product_thickness',
            'product_note:ntext',
            'product_vendor_code',
            'product_archiv:boolean',
        ],
    ])
    ?>
    <h2>Материалы</h2>
    <p>
        <?= Html::a('Добавить материал', ['admin/pm/create', 'pm_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderPm,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
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
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <h2>Упаковка</h2>
    <?php if ($dataProviderPap->count < 1): ?>
        <p>
            <?= Html::a('Добавить Упаковку', ['admin/pap/create', 'pap_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderPap,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'pap_pack_id',
                'label' => 'Упаковка',
                'value' => 'papPack.pack_title',
            ],
            'pap_capacity',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\pap',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <h2>Дополнительные параметры</h2>
    <p>
        <?= Html::a('Добавить параметр', ['admin/papr/create', 'papr_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderPapr,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'papr_parameter_id',
                'label' => 'Параметр',
                'value' => 'paprParameter.parameter_title',
            ],
            'papr_value',
            [
                'attribute' => 'papr_unit_id',
                'label' => 'Ед.изм.',
                'value' => 'paprUnit.unit_title'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\papr',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <p>
        <?= Html::a('Управление Решениями', ['admin/sp/create', 'sp_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProviderSp,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'sp_solution_id',
                'label' => 'Решение',
                'value' => 'spSolution.solution_title',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\sp',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>
</div>
