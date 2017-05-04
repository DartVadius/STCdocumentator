<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $calculation  */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
        <?= Html::submitButton($calculation->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $calculation->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= $form->field($calculation, 'calculation_product_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($calculation, 'calculation_note')->textarea(['maxlength' => true]) ?>
    <?= $form->field($calculation, 'calculation_archive')->checkbox(['value' => '1', 'uncheck' => '0']) ?>

    <?php ActiveForm::end(); ?>

</div>
