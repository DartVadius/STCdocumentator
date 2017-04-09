<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pm-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pm', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pm_id',
            'pm_product_id',
            'pm_material_id',
            'pm_quantity',
            'pm_unit_id',
            // 'pm_square',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
