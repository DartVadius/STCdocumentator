<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'position_id') ?>

    <?= $form->field($model, 'position_title') ?>

    <?= $form->field($model, 'position_desc') ?>

    <?= $form->field($model, 'position_salary_hour') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
