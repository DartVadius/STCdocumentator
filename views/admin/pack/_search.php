<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PackSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pack_id') ?>

    <?= $form->field($model, 'pack_title') ?>

    <?= $form->field($model, 'pack_desc') ?>

    <?= $form->field($model, 'pack_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
