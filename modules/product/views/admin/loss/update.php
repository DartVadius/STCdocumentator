<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Loss */

$this->title = 'Редактировать: ' . $model->loss_title;
$this->params['breadcrumbs'][] = ['label' => 'Потери', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loss_title, 'url' => ['view', 'id' => $model->loss_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 loss-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>