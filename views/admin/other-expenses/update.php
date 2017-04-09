<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OtherExpenses */

$this->title = 'Редактировать статью расходов: ' . $model->other_expenses_title;
$this->params['breadcrumbs'][] = ['label' => 'Прочие расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->other_expenses_title, 'url' => ['view', 'id' => $model->other_expenses_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="other-expenses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
