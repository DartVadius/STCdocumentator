<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Loss */

$this->title = $model->loss_title;
$this->params['breadcrumbs'][] = ['label' => 'Потери', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loss-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->loss_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->loss_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'loss_id',
            'loss_title',
            'loss_desc',
        ],
    ]) ?>

</div>
