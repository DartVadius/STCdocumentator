<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\Material;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $materials = Material::find()->all();
    $material = ArrayHelper::map($materials, 'material_id', 'material_title');
    $materialParams = [
        'prompt' => 'Выберите материал',
    ];
    ?>

    <?= $form->field($model, 'recipe_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantity_by_hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipe_approved')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
