<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Currency */

$this->title = 'Редактировать: ' . $model->currency_code;
$this->params['breadcrumbs'][] = ['label' => 'Валюта', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->currency_code, 'url' => ['view', 'id' => $model->currency_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 currency-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>