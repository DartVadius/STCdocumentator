<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */

$this->title = 'Редактировать: ' . $model->recipe_title;
$this->params['breadcrumbs'][] = ['label' => 'Рецептуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipe_title, 'url' => ['view', 'id' => $model->recipe_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 recipe-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>