<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\product\models\admin\CategoryPack;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model \app\modules\product\models\admin\Pack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $categorys = CategoryPack::find()->all();
    $category = ArrayHelper::map($categorys, 'category_pack_id', 'category_pack_title');
    $catParams = [
        'prompt' => 'Выберите категорию',
    ];
    ?>
    
    <?= $form->field($model, 'pack_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pack_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pack_price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pack_weight')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pack_category_id')->dropDownList($category, $catParams)->label('Категория') ?>
    
    <?= $form->field($model, 'pack_delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buying_date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Введите дату закупки'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
