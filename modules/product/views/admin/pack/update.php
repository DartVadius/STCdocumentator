<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pack */

$this->title = 'Редактировать упаковку: ' . $model->pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Упаковка', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pack_title, 'url' => ['view', 'id' => $model->pack_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 pack-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
