<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Должности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить должность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pop_id',
            'pop_position_id',
            'pop_product_id',
            'pop_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
