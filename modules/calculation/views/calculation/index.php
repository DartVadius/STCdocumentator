<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\calculation\models\admin\CalculationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Калькуляции';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 calculation-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            ],
        ]);
        ?>
    </div>
</div>