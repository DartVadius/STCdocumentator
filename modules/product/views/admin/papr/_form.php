<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\Parameter;
use app\modules\product\models\admin\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Papr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="papr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $parameters = Parameter::find()->all();
    $parameter = ArrayHelper::map($parameters, 'parameter_id', 'parameter_title');
    $paramsPar = [
        'prompt' => 'Выберите параметр',
    ];
    $units = Unit::find()->all();
    $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');
    $paramsUnit = [
        'prompt' => 'Выберите ед.измерения',
    ];
    ?>

    <?= $form->field($model, 'papr_product_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>

    <?= $form->field($model, 'papr_parameter_id')->dropDownList($parameter, $paramsPar) ?>

    <?= $form->field($model, 'papr_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'papr_unit_id')->dropDownList($unit, $paramsUnit) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
