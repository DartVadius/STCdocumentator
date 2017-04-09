<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Упаковка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Упаковку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pack_id',
            'pack_title',
            'pack_desc',
            'pack_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
