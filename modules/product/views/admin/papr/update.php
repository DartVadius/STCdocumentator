<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Papr */

$this->title = 'Редактировать Параметр: ' . $model->paprParameter->parameter_title;
$this->params['breadcrumbs'][] = ['label' => $model->paprProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->papr_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="papr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
