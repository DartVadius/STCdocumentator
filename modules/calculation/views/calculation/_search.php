<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\calculation\models\admin\CalculationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calculation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'calculation_id') ?>

    <?= $form->field($model, 'calculation_product_id') ?>

    <?= $form->field($model, 'calculation_product_title') ?>

    <?= $form->field($model, 'calculation_date') ?>

    <?= $form->field($model, 'calculation_note') ?>

    <?php // echo $form->field($model, 'calculation_product_capacity_hour') ?>

    <?php // echo $form->field($model, 'calculation_weight') ?>

    <?php // echo $form->field($model, 'calculation_length') ?>

    <?php // echo $form->field($model, 'calculation_width') ?>

    <?php // echo $form->field($model, 'calculation_thickness') ?>

    <?php // echo $form->field($model, 'calculation_unit') ?>

    <?php // echo $form->field($model, 'calculation_materials_data') ?>

    <?php // echo $form->field($model, 'calculation_recipe_data') ?>

    <?php // echo $form->field($model, 'calculation_packs_data') ?>

    <?php // echo $form->field($model, 'calculation_positions_data') ?>

    <?php // echo $form->field($model, 'calculation_expenses_data') ?>

    <?php // echo $form->field($model, 'calculation_losses_data') ?>

    <?php // echo $form->field($model, 'calculation_archive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
