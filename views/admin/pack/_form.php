<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pack_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pack_desc')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'pack_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
