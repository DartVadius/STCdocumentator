<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\Material;
use app\modules\product\models\admin\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $materials = Material::find()->all();
    $material = ArrayHelper::map($materials, 'material_id', 'material_title');
    $params = [
        'prompt' => 'Выберите материал',
    ];

    $unit = [];
    if (!empty($model->pm_unit_id)) {
        $units = Unit::findUnitByType($model->pm_unit_id);
        $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');
    }

    $paramsUnit = [
        'prompt' => 'Выберите учетную единицу',
    ];
    ?>

    <?= $form->field($model, 'pm_product_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>

    <?= $form->field($model, 'pm_material_id')->dropDownList($material, $params) ?>

    <?= $form->field($model, 'pm_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_unit_id')->dropDownList($unit, $paramsUnit) ?>
    
    <?= $form->field($model, 'pm_square')->radioList([0 => 'Расход на ед.продукции', 1 => 'Расход на м2'])->label(FALSE)?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
