<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PopSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pop_id') ?>

    <?= $form->field($model, 'pop_position_id') ?>

    <?= $form->field($model, 'pop_product_id') ?>

    <?= $form->field($model, 'pop_num') ?>

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
