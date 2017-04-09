<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pm_id') ?>

    <?= $form->field($model, 'pm_product_id') ?>

    <?= $form->field($model, 'pm_material_id') ?>

    <?= $form->field($model, 'pm_quantity') ?>

    <?= $form->field($model, 'pm_unit_id') ?>

    <?php // echo $form->field($model, 'pm_square') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
