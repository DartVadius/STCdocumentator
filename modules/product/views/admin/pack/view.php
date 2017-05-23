<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pack */

$this->title = $model->pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Упаковка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 pack-view">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (!empty($product)): ?>
            <p class="alert alert-warning">Невозможно удалить упаковку. Удалите ее в продуктах: <?= $product ?></p>
        <?php endif; ?>
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->pack_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'id' => $model->pack_id], [
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
                'pack_id',
                'pack_title',
                'pack_desc',
                'pack_price',
                'pack_weight',
            ],
        ])
        ?>
    </div>
</div>