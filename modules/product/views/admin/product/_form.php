<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\modules\product\models\admin\CategoryProduct;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Recipe;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

    <?= $form->field($model, 'product_note')->textarea(['maxlength' => true])->widget(TinyMce::className(), ['options' => ['rows' => 10],]) ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'product_capacity_hour')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_unit_id')->dropDownList($unit, $unitParams)->label('Ед.изм.') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_recipe_id')->dropDownList($recipe, $recipeParams)->label('Рецептура') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_category_id')->dropDownList($category, $catParams)->label('Категория') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'product_weight')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_length')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_width')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_thickness')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'product_vendor_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3">

        </div>
        <div class="col-lg-3">

        </div>
    </div>

    <?= $form->field($model, 'product_archiv')->textInput()->checkbox() ?>

    <?= $form->field($model, 'product_tech_map')->fileInput() ?>

    <?= $form->field($model, 'product_tech_desc')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
