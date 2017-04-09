<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'category_product_id') ?>

    <?= $form->field($model, 'category_product_title') ?>

    <?= $form->field($model, 'category_product_desc') ?>

    <?= $form->field($model, 'category_product_img') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
