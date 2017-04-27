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

    <h1><?= Html::encode($this->title) ?> <span class="small"><?= Html::encode($model->productRecipe->recipe_title) ?></span></h1>
    <h6 class="small">Создан: <?= $model->product_date ?></h6>
    <h6 class="small">Отредактирован: <?= $model->product_update ?></h6>
    <h6 class="small">Архив: <?= ($model->product_archiv === 1) ? 'Да' : 'Нет'; ?></h6>
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
//            [
//                'attribute' => 'product_unit_id',
//                'label' => 'Ед.учета',
//                'value' => $model->productUnit->unit_title . $model->productUnit->unit_title,
////                'contentOptions' => ['class' => 'alert alert-success'],
////                'captionOptions' => ['class' => 'alert alert-success'],
//            ],
            [
                'attribute' => 'product_capacity_hour',
                'label' => 'Выработка в час (учетная единица: ' . $model->productUnit->unit_title . ')',
                'value' => $model->product_capacity_hour,
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
//            [
//                'attribute' => 'product_recipe_id',
//                'label' => 'Рецептура',
//                'value' => $model->productRecipe->recipe_title,
////                'contentOptions' => ['class' => 'alert alert-success'],
////                'captionOptions' => ['class' => 'alert alert-success'],
//            ],            
            [
                'attribute' => 'product_category_id',
                'label' => 'Категория',
                'value' => $model->productCategory->category_product_title,
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
            'product_price',
            [
                'label' => 'Размеры, мм (длина/ширина/толщина)',
                'value' => function ($model) {
                    if (empty($model->product_length)) {
                        $model->product_length = 'не задано';
                    }
                    if (empty($model->product_width)) {
                        $model->product_width = 'не задано';
                    }
                    if (empty($model->product_thickness)) {
                        $model->product_thickness = 'не задано';
                    }
                    return $model->product_length . ' / ' . $model->product_width . ' / ' . $model->product_thickness;
                },
//                'contentOptions' => ['class' => 'alert alert-success'],
//                'captionOptions' => ['class' => 'alert alert-success'],
            ],
            'product_weight',
//            'product_length',
//            'product_width',
//            'product_thickness',
//            'product_note:ntext',
            'product_vendor_code',
//            'product_archiv:boolean',
        ],
    ])
    ?>
    <h2 class="alert-info">Затраты</h2>
    <h3>Материалы</h3>
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
    <h3>Упаковка</h3>
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
    <h3>Должности</h3>
    <p>
        <?= Html::a('Добавить должность', ['admin/pop/create', 'pop_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderPop,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'pop_position_id',
                'label' => 'Должность',
                'value' => 'popPosition.position_title',
            ],
            'pop_num',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\pop',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <h3>Прочие затраты</h3>
    <p>
        <?= Html::a('Добавить статью затрат', ['admin/op/create', 'op_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderOp,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'op_other_id',
                'label' => 'Статья затрат',
                'value' => 'opOther.other_expenses_title',
            ],
            'op_cost_hour',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\op',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <h3>Плановые потери</h3>
    <p>
    <?= Html::a('Добавить статью плановых потерь', ['admin/lp/create', 'lp_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProviderLp,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
            [
                'attribute' => 'lp_loss_id',
                'label' => 'Название',
                'value' => 'lpLoss.loss_title',
            ],
            'lp_percentage',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'admin\lp',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
                'template' => '{update}&nbsp;&nbsp;{delete}',
            ],
        ],
    ]);
    ?>
    <h2 class="alert-info">Дополнительные сведенья о продукте</h2>
    <h3>Дополнительные свойства и характеристики</h3>
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
    <h3>Решения</h3>
    <p>
    <?= Html::a('Управление Решениями', ['admin/sp/create', 'sp_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
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
    ]);
    ?>
</div>