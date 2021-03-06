<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\Material;
use app\modules\product\models\admin\Unit;
use app\modules\product\models\admin\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Pma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pma-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $category = Category::find()->all();
    $categories = ArrayHelper::map($category, 'category_id', 'category_title');
    try {
        $activ = $model->pmaMaterial->material_category_id;
    } catch (Exception $ex) {
        $activ = NULL;
    }
    $material = [];
    if (!empty($activ)) {
        $where = ['material_category_id' => $activ];
        $materials = Material::find()->where($where)->all();
        $material = ArrayHelper::map($materials, 'material_id', 'material_title');
    } elseif (!empty($model->pma_material_id)) {
        $materials = Material::find()->where(['material_id' => $model->pma_material_id])->all();
        $material = ArrayHelper::map($materials, 'material_id', 'material_title');
    }
    $params = [
        'prompt' => 'Выберите материал',
    ];


    $unit = [];
    if (!empty($model->pma_unit_id)) {
        $units = Unit::findUnitByType($model->pma_unit_id);
        $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');
    }

    $paramsUnit = [
        'prompt' => 'Выберите учетную единицу',
    ];
    ?>
    
    <label name="product_category">Категория</label>
    <select name="product_category" id="product_category" class="form-control">
        <option>Выберите категорию</option>
        <option value="0" <?= (empty($activ) && !empty($model->pma_material_id)) ? 'selected' : ''; ?>>Без категории</option>
        <?php foreach ($categories as $key => $value): ?>
            <option value="<?= $key ?>" <?= (!empty($activ) && $activ == $key) ? 'selected' : ''; ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <?= $form->field($model, 'pma_product_id')->textInput(['maxlength' => true])->hiddenInput()->label(FALSE) ?>

    <?= $form->field($model, 'pma_material_id')->dropDownList($material, $params) ?>

    <?= $form->field($model, 'pma_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pma_unit_id')->dropDownList($unit, $paramsUnit) ?>

    <?= $form->field($model, 'pma_loss')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pma_weight')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pma_brutto')->textInput()->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
