<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\admin\Material;
use app\models\admin\Unit;

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
    $units = Unit::find()->all();
    $unit = ArrayHelper::map($units, 'unit_id', 'unit_title');
    $paramsUnit = [
        'prompt' => 'Выберите учетную единицу',
    ];
    ?>

    <?= $form->field($model, 'pm_product_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>

    <?= $form->field($model, 'pm_material_id')->dropDownList($material, $params) ?>

    <?= $form->field($model, 'pm_quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pm_unit_id')->dropDownList($unit, $paramsUnit) ?>
    
    <?php $model->pm_square = '0' ?>
    
    <?= $form->field($model, 'pm_square')->radio(['label' => 'Расход на ед.продукции', 'value' => 0, 'uncheck' => null]) ?>
    
    <?= $form->field($model, 'pm_square')->radio(['label' => 'Расход на м2', 'value' => 1, 'uncheck' => null]) ?>
   
    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
