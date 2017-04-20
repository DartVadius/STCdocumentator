<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\admin\Loss;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Lp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lp-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $losses = Loss::find()->all();
    $loss = ArrayHelper::map($losses, 'loss_id', 'loss_title');    
    $params = [
        'prompt' => 'Выберите статью потерь',        
    ];
    ?>
    
    <?= $form->field($model, 'lp_loss_id')->dropDownList($loss, $params) ?>

    <?= $form->field($model, 'lp_percentage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
