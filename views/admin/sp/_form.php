<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\admin\Solution;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Sp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $solutions = Solution::find()->all();
    $solution = ArrayHelper::map($solutions, 'solution_id', 'solution_title');
    ?>
    
    <?=$form->field($model, 'sp_solution_ids')->checkboxList($solution, ['label' => $solution[1], 'value' => $solution[0], 'uncheck' => null])->label('Решения'); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
