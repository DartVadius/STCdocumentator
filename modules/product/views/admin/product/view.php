<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Product */

$this->title = $model->product_title;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 view">
        <h1><?= Html::encode($this->title) ?>
            <?php if (!empty($model->productRecipe)): ?> 
                <span class="small"><?= Html::encode($model->productRecipe->recipe_title) ?></span>
            <?php endif; ?>
        </h1>
        <h6 class="small">Создан: <?= $model->product_date ?></h6>
        <h6 class="small">Отредактирован: <?= $model->product_update ?></h6>
        <h6 class="small">Архив: <?= ($model->product_archiv === 1) ? 'Да' : 'Нет'; ?></h6>
        <div class="row">
            <div class="col-lg-10">
                <p>
                    <?=
                    Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $model->product_id], [
                        'class' => 'btn btn-primary',
                        'title' => 'Редактировать',
                    ])
                    ?>
                    <?=
                    Html::a('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['delete', 'id' => $model->product_id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены?',
                            'method' => 'post',
                        ],
                        'title' => 'Удалить',
                    ]);
                    ?>
                    <?=
                    Html::a('<span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>', ['clone', 'id' => $model->product_id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'confirm' => 'Сделать копию?',
                            'method' => 'post',
                        ],
                        'title' => 'Сделать копию',
                    ]);
                    ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?=
                    Html::a('Калькуляция', ['/calculation/calculation/create', 'id_product' => $model->product_id], ['class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                        ],])
                    ?>
                </p>
            </div>
        </div>


        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'product_capacity_hour',
                    'label' => 'Выработка в час (учетная единица: ' . $model->productUnit->unit_title . ')',
                    'value' => $model->product_capacity_hour,
                ],
                [
                    'attribute' => 'product_tech_map',
                    'label' => 'Тех.карта',
                    'value' => function ($model) {
                        if (!empty($model->product_tech_map)) {
                            return '<p><a href="/product/index/pdf?id=' . $model->product_id . '" target="_blank">Тех.карта</a></p>';
                        }
                        return FALSE;
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'product_tech_desc',
                    'label' => 'Тех.описание',
                    'value' => function ($model) {
                        if (!empty($model->product_tech_desc)) {
                            return '<p><a href="/' . $model->product_tech_desc . '" target="_blank">Тех.описание</a></p>';
                        }
                        return FALSE;
                    },
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'product_category_id',
                    'label' => 'Категория',
                    'value' => $model->productCategory->category_product_title,
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
                ],
                'product_weight',
                'product_recipe_weight',
                [
                    'attribute' => 'product_note',
                    'format' => 'raw',
                ],
                'product_vendor_code',
            ],
        ])
        ?>
        <h1>Затраты</h1>
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/pm/create', 'pm_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Основные Материалы</h3>

        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPm,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Pm',
            ],
            'columns' => [
                [
                    'attribute' => 'pm_material_id',
                    'label' => 'Материал',
                    'value' => 'pmMaterial.material_title'
                ],
//                'pm_quantity',
                [
                    'attribute' => 'pm_quantity',
                    'label' => 'Расход',
                    'value' => 'pm_quantity',
                    'contentOptions' => ['data-field' => 'pm_quantity'],
                ],
                [
                    'attribute' => 'pm_unit_id',
                    'label' => 'Ед.учета',
                    'value' => 'pmUnit.unit_title',
                ],
                [
                    'attribute' => 'pm_loss',
                    'label' => 'Плановые потери, %',
                    'value' => 'pm_loss',
                    'contentOptions' => ['data-field' => 'pm_loss'],
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
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/pma/create', 'pma_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Вспомогательные материалы</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPma,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Pma',
            ],
            'columns' => [
                [
                    'attribute' => 'pma_material_id',
                    'label' => 'Материал',
                    'value' => 'pmaMaterial.material_title'
                ],
                [
                    'attribute' => 'pma_quantity',
                    'label' => 'Расход',
                    'value' => 'pma_quantity',
                    'contentOptions' => ['data-field' => 'pma_quantity'],
                ],
                [
                    'attribute' => 'pma_unit_id',
                    'label' => 'Ед.учета',
                    'value' => 'pmaUnit.unit_title'
                ],
                [
                    'attribute' => 'pma_weight',
                    'label' => 'Вес на ед.продукции, гр',
                    'value' => 'pma_weight',
                    'contentOptions' => ['data-field' => 'pma_weight'],
                ],
                [
                    'attribute' => 'pma_loss',
                    'label' => 'Плановые потери',
                    'value' => 'pma_loss',
                    'contentOptions' => ['data-field' => 'pma_loss'],
                ],
                'pma_brutto:boolean',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'admin\pma',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '100'],
                    'template' => '{update}&nbsp;&nbsp;{delete}',
                ],
            ],
        ]);
        ?>
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/pap/create', 'pap_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Упаковка</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPap,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Pap',
            ],
            'columns' => [
                [
                    'attribute' => 'pap_pack_id',
                    'label' => 'Упаковка',
                    'value' => 'papPack.pack_title',
                ],
                [
                    'attribute' => 'pap_capacity',
                    'label' => 'Емкость упаковки',
                    'value' => 'pap_capacity',
                    'contentOptions' => ['data-field' => 'pap_capacity'],
                ],
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
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/pop/create', 'pop_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Должности</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPop,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Pop',
            ],
            'columns' => [
                [
                    'attribute' => 'pop_position_id',
                    'label' => 'Должность',
                    'value' => 'popPosition.position_title',
                ],
                [
                    'attribute' => 'pop_num',
                    'label' => 'Число сотрудников',
                    'value' => 'pop_num',
                    'contentOptions' => ['data-field' => 'pop_num'],
                ],
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
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/op/create', 'op_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Прочие затраты</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderOp,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Op',
            ],
            'columns' => [
                [
                    'attribute' => 'op_other_id',
                    'label' => 'Статья затрат',
                    'value' => 'opOther.other_expenses_title',
                ],
                [
                    'attribute' => 'op_cost_hour',
                    'label' => 'грн/час',
                    'value' => 'op_cost_hour',
                    'contentOptions' => ['data-field' => 'op_cost_hour'],
                ],
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
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/lp/create', 'lp_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Плановые потери</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderLp,
            'summary' => false,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Lp',
            ],
            'columns' => [
                [
                    'attribute' => 'lp_loss_id',
                    'label' => 'Название',
                    'value' => 'lpLoss.loss_title',
                ],
                [
                    'attribute' => 'lp_percentage',
                    'label' => '%',
                    'value' => 'lp_percentage',
                    'contentOptions' => ['data-field' => 'lp_percentage'],
                ],
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
        <h1>Дополнительная информация о продукте</h1>
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/papr/create', 'papr_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Свойства и характеристики</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPapr,
            'summary' => false,
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
        <h3><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', ['admin/sp/create', 'sp_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?> Решения</h3>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderSp,
            'summary' => false,
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
</div>
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>