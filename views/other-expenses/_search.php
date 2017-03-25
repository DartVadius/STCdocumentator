<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OtherExpensesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-expenses-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'other_expenses_id') ?>

    <?= $form->field($model, 'other_expenses_title') ?>

    <?= $form->field($model, 'other_expenses_desc') ?>

    <?= $form->field($model, 'other_expenses_costs_hour') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
