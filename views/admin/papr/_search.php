<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PaprSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="papr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'papr_id') ?>

    <?= $form->field($model, 'papr_parameter_id') ?>

    <?= $form->field($model, 'papr_product_id') ?>

    <?= $form->field($model, 'papr_value') ?>

    <?= $form->field($model, 'papr_unit_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
