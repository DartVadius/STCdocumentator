<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\product\models\admin\Pack;
use app\modules\product\models\admin\CategoryPack;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $category = CategoryPack::find()->all();
    $categories = ArrayHelper::map($category, 'category_pack_id', 'category_pack_title');
    try {
        $activ = $model->papPack->pack_category_id;
    } catch (Exception $ex) {
        $activ = NULL;
    }

    $pack = [];
    if (!empty($activ)) {
        $where = ['pack_category_id' => $activ];
        $packs = Pack::find()->where($where)->all();
        $pack = ArrayHelper::map($packs, 'pack_id', 'pack_title');
    } elseif (!empty($model->pap_pack_id)) {
        $packs = Pack::find()->where(['pack_id' => $model->pap_pack_id])->all();
        $pack = ArrayHelper::map($packs, 'pack_id', 'pack_title');
    }

    $params = [
        'prompt' => 'Выберите упаковку',
    ];
    ?>

    <label name="pack_category">Категория</label>
    <select name="pack_category" id="pack_category" class="form-control">
        <option>Выберите категорию</option>
        <option value="0" <?= (empty($activ) && !empty($model->pap_pack_id)) ? 'selected' : ''; ?>>Без категории</option>
        <?php foreach ($categories as $key => $value): ?>
            <option value="<?= $key ?>" <?= (!empty($activ) && $activ == $key) ? 'selected' : ''; ?>><?= $value ?></option>
        <?php endforeach; ?>
    </select>

    <?= $form->field($model, 'pap_product_id')->textInput(['maxlength' => true])->hiddenInput()->label(FALSE) ?>

    <?= $form->field($model, 'pap_pack_id')->dropDownList($pack, $params) ?>

    <?= $form->field($model, 'pap_capacity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJsFile('@web/js/product_admin_pap.js'); ?>