<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Lp */

$this->title = 'Добавить статью плановых потерь';
$this->params['breadcrumbs'][] = ['label' => $model->lpProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->lp_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
