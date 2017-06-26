<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pap */

$this->title = 'Редактировать упаковку: ' . $model->papPack->pack_title;
$this->params['breadcrumbs'][] = ['label' => $model->papProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pap_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 pap-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>