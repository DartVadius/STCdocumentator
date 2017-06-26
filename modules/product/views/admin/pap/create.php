<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Pap */

$this->title = 'Добавить упаковку';
$this->params['breadcrumbs'][] = ['label' => 'Продукт', 'url' => ['admin/product/view', 'id' => $model->pap_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12 pap-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>