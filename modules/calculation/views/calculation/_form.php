<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $calculation  */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?=
        Html::submitButton($calculation->isNewRecord ? '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>', [
            'class' => $calculation->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'title' => 'Сохранить',
        ])
        ?>
    </div>

    <?= $form->field($calculation, 'calculation_product_title')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($calculation, 'calculation_note')->widget(DatePicker::className(), [
        'value' => date('d-M-Y'),
        'options' => ['placeholder' => 'Выберите дату ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ])
    ?>
    <?= $form->field($calculation, 'calculation_archive')->checkbox(['value' => '1', 'uncheck' => '0']) ?>

<?php ActiveForm::end(); ?>

</div>
