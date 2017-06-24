<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Papr */

$this->title = 'Добавить параметр';
$this->params['breadcrumbs'][] = ['label' => $model->paprProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->papr_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 papr-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>