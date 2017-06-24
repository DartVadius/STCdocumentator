<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\product\models\admin\Category;
use app\modules\product\models\admin\Unit;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 material-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать Материал', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'material_title',
                'material_price',
                [
                    'attribute' => 'material_currency_type',
                    'label' => 'Валюта',
                    'value' => 'materialCurrencyType.currency_code',
                    'headerOptions' => ['width' => '100'],
                ],
                [
                    'attribute' => 'material_unit_id',
                    'label' => 'Ед.изм.',
                    'value' => 'materialUnit.unit_title',
                    'headerOptions' => ['width' => '100'],
                ],
                'material_delivery',
                [
                    'label' => 'Цена с доставкой',
                    'value' => function ($model) {
                        return $model->material_price + $model->material_price * $model->material_delivery / 100;
                    },
                ],
                [
                    'attribute' => 'material_category_id',
                    'label' => 'Категория',
                    'value' => 'materialCategory.category_title',
                    'filter' => Category::find()->select(['category_title', 'category_id'])->indexBy('category_id')->column(),
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '100'],
                ],
            ],
        ]);
        ?>
    </div>
</div>