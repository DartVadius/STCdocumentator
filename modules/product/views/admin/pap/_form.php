<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\product\models\admin\Pack;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $packs = Pack::find()->all();
    $pack = ArrayHelper::map($packs, 'pack_id', 'pack_title');    
    $params = [
        'prompt' => 'Выберите материал',        
    ];
    ?>
    
    <?= $form->field($model, 'pap_product_id')->textInput(['maxlength' => true])->hiddenInput()->label('') ?>
    
    <?= $form->field($model, 'pap_pack_id')->dropDownList($pack, $params) ?>

    <?= $form->field($model, 'pap_capacity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
