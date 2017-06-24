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
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 view">
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
                    <?= Html::a('Редактировать', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('Удалить', ['delete', 'id' => $model->product_id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены?',
                            'method' => 'post',
                        ],
                    ]);
                    ?>
                    <?=
                    Html::a('Сделать копию', ['clone', 'id' => $model->product_id], [
                        'class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                        ],
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
                [
                    'attribute' => 'product_note',
                    'format' => 'raw',
                ],
                'product_vendor_code',
            ],
        ])
        ?>
        <h2 class="alert-info">Затраты</h2>
        <h3>Основные Материалы</h3>
        <p>
            <?= Html::a('Добавить материал', ['admin/pm/create', 'pm_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPm,
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
                'pm_loss',
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
        <h3>Вспомогательные материалы</h3>
        <p>
            <?= Html::a('Добавить материал', ['admin/pma/create', 'pma_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProviderPma,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed'
            ],
            'columns' => [
                [
                    'attribute' => 'pma_material_id',
                    'label' => 'Материал',
                    'value' => 'pmaMaterial.material_title'
                ],
                'pma_quantity',
                [
                    'attribute' => 'pma_unit_id',
                    'label' => 'Ед.учета',
                    'value' => 'pmaUnit.unit_title'
                ],
                'pma_loss',
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
        <h3>Упаковка</h3>
        <?php //if ($dataProviderPap->count < 1):    ?>
        <p>
            <?= Html::a('Добавить Упаковку', ['admin/pap/create', 'pap_product_id' => $model->product_id], ['class' => 'btn btn-success']) ?>
        </p>
        <?php //endif;  ?>
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