<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pap-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pap_id',
            'pap_pack_id',
            'pap_product_id',
            'pap_capacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
