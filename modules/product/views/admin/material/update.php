<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Material */

$this->title = 'Редактировать Материал: ' . $model->material_title;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_title, 'url' => ['view', 'id' => $model->material_id]];
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 material-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>