<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\admin\Position;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pop-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $positions = Position::find()->all();
    $position = ArrayHelper::map($positions, 'position_id', 'position_title');
    $params = [
        'prompt' => 'Выберите должность',
    ];
    ?>
    <?= $form->field($model, 'pop_position_id')->dropDownList($position, $params) ?>

    <?= $form->field($model, 'pop_num')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
