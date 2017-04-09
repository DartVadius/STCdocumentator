<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */

$this->title = 'Update Pm: ' . $model->pm_id;
$this->params['breadcrumbs'][] = ['label' => 'Pms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pm_id, 'url' => ['view', 'id' => $model->pm_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
