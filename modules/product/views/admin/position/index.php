<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Должности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 position-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать должность', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Position'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'position_title',
                [
                    'attribute' => 'position_salary_hour',
                    'label' => 'Оплата в час, грн',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->position_salary_hour);
                    },
                    'contentOptions' => [
                        'data-field' => 'position_salary_hour',
                        'style' => 'text-align:right'
                    ],
                ],
                'position_desc',
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
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>