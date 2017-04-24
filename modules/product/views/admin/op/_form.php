<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\product\models\admin\OtherExpenses;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Op */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="op-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $others = OtherExpenses::find()->all();
    $other = ArrayHelper::map($others, 'other_expenses_id', 'other_expenses_title');    
    $params = [
        'prompt' => 'Выберите статью затрат',        
    ];
    ?>
    
    <?= $form->field($model, 'op_other_id')->dropDownList($other, $params) ?>

    <?= $form->field($model, 'op_cost_hour')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
