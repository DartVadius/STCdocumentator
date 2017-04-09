<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\admin\CategoryProduct;
use app\models\admin\Unit;
use app\models\admin\Recipe;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $categorys = CategoryProduct::find()->all();
    $category = ArrayHelper::map($categorys, 'category_product_id', 'category_product_title');
    $catParams = [
        'prompt' => 'Выберите категорию',
    ];
    $units = Unit::find()->all();
    $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');
    $unitParams = [
        'prompt' => 'Выберите ед.измерения',
    ];
    $recipes = Recipe::find()->all();
    $recipe = ArrayHelper::map($recipes, 'recipe_id', 'recipe_title');
    $recipeParams = [
        'prompt' => 'Выберите рецептуру',
    ];
    ?>

    <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_note')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_capacity_hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_recipe_id')->dropDownList($recipe, $recipeParams)->label('Рецептура') ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_unit_id')->dropDownList($unit, $unitParams)->label('Ед.изм.') ?>

    <?= $form->field($model, 'product_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_thickness')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_category_id')->dropDownList($category, $catParams)->label('Категория') ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
