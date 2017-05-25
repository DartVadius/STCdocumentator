<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Op */

$this->title = 'Редактировать: ' . $model->opOther->other_expenses_title;
$this->params['breadcrumbs'][] = ['label' => $model->opProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->op_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 op-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>