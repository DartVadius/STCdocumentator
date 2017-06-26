<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Op */

$this->title = 'Добавить статью затрат';
$this->params['breadcrumbs'][] = ['label' => $model->opProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->op_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 op-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>