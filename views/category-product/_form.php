<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_product_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_product_img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
