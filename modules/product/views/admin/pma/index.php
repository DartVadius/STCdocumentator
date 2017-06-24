<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\admin\PmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pmas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pma_id',
            'pma_product_id',
            'pma_material_id',
            'pma_quantity',
            'pma_unit_id',
            // 'pma_loss',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
