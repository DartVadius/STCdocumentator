<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\LpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lp_id') ?>

    <?= $form->field($model, 'lp_loss_id') ?>

    <?= $form->field($model, 'lp_product_id') ?>

    <?= $form->field($model, 'lp_percentage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
