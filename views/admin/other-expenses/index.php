<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OtherExpensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Прочие Расходы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-expenses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую Статью расходов', ['create'], ['class' => 'btn btn-success']) ?>
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
            'other_expenses_title',
            'other_expenses_desc',
            'other_expenses_costs_hour',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
            ],
        ],
    ]);
    ?>
</div>
