<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */

$this->title = 'Редактировать материал в : ' . $model->pmProduct->product_title;
$this->params['breadcrumbs'][] = ['label' => $model->pmProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pm_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="pm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
