<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Papr */

$this->title = $model->papr_id;
$this->params['breadcrumbs'][] = ['label' => 'Paprs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="papr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->papr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->papr_id], [
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
            'papr_id',
            'papr_parameter_id',
            'papr_product_id',
            'papr_value',
            'papr_unit_id',
        ],
    ]) ?>

</div>
