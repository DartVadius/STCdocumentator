<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'recipe_date')->textInput() ?>

    <?= $form->field($model, 'recipe_update')->textInput() ?>

    <?= $form->field($model, 'recipe_approved')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
