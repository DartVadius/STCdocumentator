<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\OpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="op-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'op_id') ?>

    <?= $form->field($model, 'op_other_id') ?>

    <?= $form->field($model, 'op_product_id') ?>

    <?= $form->field($model, 'op_cost_hour') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
