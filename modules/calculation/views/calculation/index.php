<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\calculation\models\admin\CalculationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categoryService app\modules\services\CategoryProductService */
/* @var $model app\modules\product\models\admin\CategoryProduct */

$this->title = 'Калькуляции';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 calculation-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php
        $form = ActiveForm::begin([
            'action' => ['recreate'],
            'id' => 'category_select',
            'method' => 'post',
            'options' => [
//                'class' => 'form-inline'
            ]
        ]);
        $categories = $categoryService->getAllCategories();
        $category = ArrayHelper::map($categories, 'category_product_id', 'category_product_title');
        $catParams = [
            'prompt' => 'Выберите категорию',
        ];
        ?>
        <div class="row">
            <div class="form-group col-xs-4">
                <?=
                Html::submitButton('Переформировать калькуляции', [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены?'
                    ]
                ])
                ?>
                <p>
                    <?= $form->field($model, 'category_product_id')->dropDownList($category, $catParams)->label(false) ?>
                </p>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-condensed'
            ],
            'columns' => [
                [
                    'attribute' => 'calculation_product_title',
                    'value' => function ($model) {
                        return '<a href="view/?id=' . $model->calculation_id . '">' . $model->calculation_product_title . '</a>';
                    },
                    'format' => 'raw'
                ],
                'calculation_note',
                [
                    'attribute' => 'calculation_date',
                    'label' => 'Дата',
                    'headerOptions' => ['width' => '200'],
                ],
                [
                    'attribute' => 'calculation_archive',
                    'label' => 'Архив',
                    'value' => function ($model) {
                        if ($model->calculation_archive === 0) {
                            return 'нет';
                        }
                        return 'да';
                    },
                    'filter' => ['нет', 'да'],
                    'headerOptions' => ['width' => '100'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                ],
            ],
        ]);
        ?>
    </div>
</div>