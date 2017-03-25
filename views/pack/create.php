<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pack */

$this->title = 'Создать Упаковку';
$this->params['breadcrumbs'][] = ['label' => 'Упаковка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
