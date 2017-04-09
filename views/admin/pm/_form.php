<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pm_product_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_material_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_unit_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_square')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
