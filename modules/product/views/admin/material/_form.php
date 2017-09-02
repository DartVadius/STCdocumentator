<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\product\models\admin\Category;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Currency;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $categorys = Category::find()->all();
    $category = ArrayHelper::map($categorys, 'category_id', 'category_title');    
    $catParams = [
        'prompt' => 'Выберите категорию',        
    ];
    $units = Unit::find()->all();
    $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');    
    $unitParams = [
        'prompt' => 'Выберите ед.измерения',        
    ];
    $currencies = Currency::find()->all();
    $currency = ArrayHelper::map($currencies, 'currency_id', 'currency_code');    
    $currencyParams = [
        'prompt' => 'Валюта закупки',        
    ];
    ?>

    <?= $form->field($model, 'material_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_category_id')->dropDownList($category, $catParams)->label('Категория') ?>

    <?= $form->field($model, 'material_unit_id')->dropDownList($unit, $unitParams)->label('Ед.изм.') ?>
    
    <?= $form->field($model, 'material_currency_type')->dropDownList($currency, $currencyParams)->label('Валюта закупки') ?>
    
    <?= $form->field($model, 'material_delivery')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
