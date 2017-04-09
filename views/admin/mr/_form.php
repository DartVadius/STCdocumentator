<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\admin\Material;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Mr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mr-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $materials = Material::find()->all();
    $material = ArrayHelper::map($materials, 'material_id', 'material_title');    
    $params = [
        'prompt' => 'Выберите материал',        
    ];
    ?>

    <?= $form->field($model, 'mr_recipe_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>

    <?= $form->field($model, 'mr_material_id')->dropDownList($material, $params) ?>
    
    <?= $form->field($model, 'mr_percentage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
