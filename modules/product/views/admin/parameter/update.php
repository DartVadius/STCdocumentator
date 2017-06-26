<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parameter */

$this->title = 'Редактировать Параметр: ' . $model->parameter_title;
$this->params['breadcrumbs'][] = ['label' => 'Параметры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parameter_title, 'url' => ['view', 'id' => $model->parameter_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 parameter-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>