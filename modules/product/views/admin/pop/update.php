<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pop */

$this->title = 'Редактировать должность: ' . $model->popPosition->position_title;
$this->params['breadcrumbs'][] = ['label' => $model->popProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pop_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 pop-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>