<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mr */

$this->title = $model->mrRecipe->recipe_title . ': ' .$model->mrMaterial->material_title;
$this->params['breadcrumbs'][] = ['label' => $model->mrRecipe->recipe_title, 'url' => ['recipe/view', 'id' => $model->mr_recipe_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->mr_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->mr_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mr_id',
            'mr_percentage',
            [
                'label' => Рецептура,
                'value' => $model->mrRecipe->recipe_title,
            ],
            [
                'label' => Материал,
                'value' => $model->mrMaterial->material_title,
            ],
        ],
    ]) ?>

</div>
