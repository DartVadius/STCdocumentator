<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Редактировать категорию: ' . $model->category_title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_title, 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="category-update col-lg-12">

        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</div>