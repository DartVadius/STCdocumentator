<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\OpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="op-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Op', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'op_id',
            'op_other_id',
            'op_product_id',
            'op_cost_hour',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
