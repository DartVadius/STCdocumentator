<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\OtherExpenses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="other-expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'other_expenses_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_expenses_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
