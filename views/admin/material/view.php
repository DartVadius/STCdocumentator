<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Material */

$this->title = $model->material_title;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if ($product): ?>
    <p class="alert alert-warning">Невозможно удалить материал. Удалите его в продуктах: <?= $product ?></p>
    <?php endif; ?>
    <?php if ($recipe): ?>
    <p class="alert alert-warning">Невозможно удалить материал. Удалите его в рецептурах: <?= $recipe ?></p>
    <?php endif; ?>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->material_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'material_id',
            'material_title',
            'material_price',
            'material_article',
            [
                'attribute' => 'material_category_id',
                'label' => 'Категория',
                'value' => function (app\models\admin\Material $material) {
                    return $material->materialCategory->category_title;
                },
            ],
            [
                'attribute' => 'material_unit_id',                
                'label' => 'Ед.изм.',
                'value' => function (app\models\admin\Material $material) {
                    return $material->materialUnit->unit_title;
                },
            ],
        ],
    ]) ?>

</div>
