<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_title') ?>

    <?= $form->field($model, 'product_capacity_hour') ?>

    <?= $form->field($model, 'product_date') ?>

    <?= $form->field($model, 'product_update') ?>

    <?php // echo $form->field($model, 'product_unit_id') ?>

    <?php // echo $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_category_id') ?>

    <?php // echo $form->field($model, 'product_weight') ?>

    <?php // echo $form->field($model, 'product_length') ?>

    <?php // echo $form->field($model, 'product_width') ?>

    <?php // echo $form->field($model, 'product_thickness') ?>

    <?php // echo $form->field($model, 'product_note') ?>

    <?php // echo $form->field($model, 'product_recipe_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
