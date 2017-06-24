<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solution */

$this->title = 'Создать Решение';
$this->params['breadcrumbs'][] = ['label' => 'Решения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 solution-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>