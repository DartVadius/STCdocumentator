<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Pma */

$this->title = $model->pma_id;
$this->params['breadcrumbs'][] = ['label' => 'Pmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pma_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pma_id], [
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
            'pma_id',
            'pma_product_id',
            'pma_material_id',
            'pma_quantity',
            'pma_unit_id',
            'pma_loss',
        ],
    ]) ?>

</div>
