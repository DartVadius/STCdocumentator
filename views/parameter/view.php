<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parameter */

$this->title = $model->parameter_title;
$this->params['breadcrumbs'][] = ['label' => 'Параметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->parameter_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['delete', 'id' => $model->parameter_id], [
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
            'parameter_id',
            'parameter_title',
            'parameter_desc',
        ],
    ]) ?>

</div>
