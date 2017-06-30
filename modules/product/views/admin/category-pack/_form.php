<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\CategoryPack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_pack_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_pack_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
