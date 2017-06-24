<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\PmaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pma_id') ?>

    <?= $form->field($model, 'pma_product_id') ?>

    <?= $form->field($model, 'pma_material_id') ?>

    <?= $form->field($model, 'pma_quantity') ?>

    <?= $form->field($model, 'pma_unit_id') ?>

    <?php // echo $form->field($model, 'pma_loss') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
