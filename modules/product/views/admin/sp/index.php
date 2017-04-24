<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\SpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sp_id',
            'sp_solution_id',
            'sp_product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
