<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Pop */

$this->title = 'Добавить должность';
$this->params['breadcrumbs'][] = ['label' => $model->popProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pop_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
