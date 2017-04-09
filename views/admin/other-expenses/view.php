<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OtherExpenses */

$this->title = $model->other_expenses_title;
$this->params['breadcrumbs'][] = ['label' => 'Прочие Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="other-expenses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->other_expenses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->other_expenses_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'other_expenses_id',
            'other_expenses_title',
            'other_expenses_desc',
            'other_expenses_costs_hour',
        ],
    ]) ?>

</div>
