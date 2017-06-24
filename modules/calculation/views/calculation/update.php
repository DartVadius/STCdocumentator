<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Редактировать калькуляцию: ' . $calculation->calculation_product_title;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = ['label' => 'Калькуляции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $calculation->calculation_product_title, 'url' => ['view', 'id' => $calculation->calculation_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 category-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'calculation' => $calculation,
        ])
        ?>
    </div>
</div>