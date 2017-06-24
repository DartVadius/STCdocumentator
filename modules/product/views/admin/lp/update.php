<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Lp */

$this->title = 'Редактировать: ' . $model->lpLoss->loss_title;
$this->params['breadcrumbs'][] = ['label' => $model->lpProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->lp_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 lp-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>