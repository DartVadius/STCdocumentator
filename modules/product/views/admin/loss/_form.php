<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Loss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loss-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loss_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loss_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
