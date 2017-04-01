<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $baseUnits = Unit::find()->where(['unit_parent_id' => 0])->all();
    $items = ArrayHelper::map($baseUnits, 'unit_id', 'unit_title');
    $items[0] = 'Базовая единица измерения';
    $param = ['options' => ['0' => ['selected' => TRUE]]];
    ?>

    <?= $form->field($model, 'unit_title')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'unit_parent_id')->dropDownList($items, $param)->label('Базовая единица измерения') ?>

    <?= $form->field($model, 'unit_ratio')->textInput(['maxlength' => true, 'value' => 1])
            ->label('Коэффициент')
            ->hint('Базовая ед. * Коэфф. = Ед. изм.; Для базовой ед. оставьте коэффициент = 1') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
