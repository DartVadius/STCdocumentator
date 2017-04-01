<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recipe_id') ?>

    <?= $form->field($model, 'recipe_title') ?>

    <?= $form->field($model, 'recipe_note') ?>

    <?= $form->field($model, 'recipe_date') ?>

    <?= $form->field($model, 'recipe_update') ?>

    <?php // echo $form->field($model, 'recipe_approved') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
