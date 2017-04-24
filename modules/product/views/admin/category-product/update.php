<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryProduct */

$this->title = 'Редактировать категорию: ' . $model->category_product_title;
$this->params['breadcrumbs'][] = ['label' => 'Категории Продуктов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_product_title, 'url' => ['view', 'id' => $model->category_product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
