<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Unit;
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
    ?>

    <?= $form->field($model, 'material_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'materil_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_catrgory_id')->dropDownList($category, $catParams)->label('Категория') ?>

    <?= $form->field($model, 'material_unit_id')->dropDownList($unit, $unitParams)->label('Ед.изм.') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
