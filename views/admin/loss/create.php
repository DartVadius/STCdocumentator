<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Loss */

$this->title = 'Добавить статью плановых потерь';
$this->params['breadcrumbs'][] = ['label' => 'Потери', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
