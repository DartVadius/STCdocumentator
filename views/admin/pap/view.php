<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pap */

$this->title = $model->pap_id;
$this->params['breadcrumbs'][] = ['label' => 'Paps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pap-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pap_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pap_id], [
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
            'pap_id',
            'pap_pack_id',
            'pap_product_id',
            'pap_capacity',
        ],
    ]) ?>

</div>
