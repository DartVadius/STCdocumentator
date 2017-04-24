<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PapSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pap-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pap_id') ?>

    <?= $form->field($model, 'pap_pack_id') ?>

    <?= $form->field($model, 'pap_product_id') ?>

    <?= $form->field($model, 'pap_capacity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
