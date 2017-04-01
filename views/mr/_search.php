<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mr_id') ?>

    <?= $form->field($model, 'mr_percentage') ?>

    <?= $form->field($model, 'mr_recipe_id') ?>

    <?= $form->field($model, 'mr_material_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
