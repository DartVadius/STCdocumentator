<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Редактировать: ' . $model->unit_title;
$this->params['breadcrumbs'][] = ['label' => 'Ед.изм', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unit_id, 'url' => ['view', 'id' => $model->unit_id]];
?>
<div class="unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
