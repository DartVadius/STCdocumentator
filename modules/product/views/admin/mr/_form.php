<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\product\models\admin\Material;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Mr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mr-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $category = Category::find()->all();
    $categories = ArrayHelper::map($category, 'category_id', 'category_title');
    try {
        $activ = $model->mrMaterial->material_category_id;
    } catch (Exception $ex) {
        $activ = NULL;
    }

    $material = [];
    if (!empty($activ)) {
        $where = ['material_category_id' => $activ];
        $materials = Material::find()->where($where)->all();
        $material = ArrayHelper::map($materials, 'material_id', 'material_title');
    }
    $params = [
        'prompt' => 'Выберите материал',
    ];
    ?>
    
    <label name="product_category">Категория</label>
    <select name="product_category" id="product_category" class="form-control">
        <option>Выберите категорию</option>
        <option value="0">Без категории</option>
        <?php foreach ($categories as $key => $value): ?>
            <option value="<?= $key ?>" <?= (!empty($activ) && $activ == $key) ? 'selected' : ''; ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>
    
    <?= $form->field($model, 'mr_recipe_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>

    <?= $form->field($model, 'mr_material_id')->dropDownList($material, $params) ?>
    
    <?= $form->field($model, 'mr_percentage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
