<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\product\models\admin\Position*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'position_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_desc')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'position_salary_hour')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'by_item')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
