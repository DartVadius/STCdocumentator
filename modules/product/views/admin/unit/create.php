<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Ед.изм', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->unit_id;
?>
<div class="row">
    <div class="col-lg-12 unit-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>