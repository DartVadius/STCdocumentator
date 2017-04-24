<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Op */

$this->title = $model->op_id;
$this->params['breadcrumbs'][] = ['label' => 'Ops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="op-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->op_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->op_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'op_id',
            'op_other_id',
            'op_product_id',
            'op_cost_hour',
        ],
    ]) ?>

</div>
