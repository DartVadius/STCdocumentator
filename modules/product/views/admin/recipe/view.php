<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */

$this->title = $model->recipe_title;
$this->params['breadcrumbs'][] = ['label' => 'Рецептуры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 recipe-view">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (!empty($product)): ?>
            <p class="alert alert-warning">Невозможно удалить рецептуру. Удалите ее в продуктах: <?= $product ?></p>
        <?php endif; ?>
        <p></p>
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->recipe_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'id' => $model->recipe_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'recipe_title',
                'recipe_note:ntext',
                'recipe_date',
                'recipe_update',
                'quantity_by_hour',
                'recipe_approved:boolean',
            ],
        ])
        ?>

        <p>
            <?= Html::a('Добавить материал', ['admin/mr/create', 'mr_recipe_id' => $model->recipe_id], ['class' => 'btn btn-success']) ?>        
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed'
            ],
            'columns' => [
                [
                    'attribute' => 'mr_material_id',
                    'label' => 'Материал',
                    'value' => 'mrMaterial.material_title'
                ],
                [
                    'attribute' => 'mr_percentage',
                    'label' => '%  (всего ' . $total . '%)',
                    'value' => 'mr_percentage',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'admin\mr',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '100'],
                    'template' => '{update}&nbsp;&nbsp;{delete}',
                ],
            ],
        ]);
        ?>

    </div>
</div>