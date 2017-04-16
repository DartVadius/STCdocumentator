<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solution */

$this->title = $model->solution_title;
$this->params['breadcrumbs'][] = ['label' => 'Решения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solution-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->solution_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->solution_id], [
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
            'solution_id',
            'solution_title',
            'solution_desc:ntext',
        ],
    ]) ?>

</div>
