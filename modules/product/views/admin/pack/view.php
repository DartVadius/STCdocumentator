<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\product\models\admin\Pack;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Pack */

$this->title = $model->pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Упаковка', 'url' => ['index']];
if (!empty($model->pack_category_id)) {
    $this->params['breadcrumbs'][] = ['label' => $model->packCategory->category_pack_title, 'url' => ['index', 'pack_category_id' => $model->pack_category_id]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 pack-view">
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
                [
                    'attribute' => 'pack_category_id',
                    'label' => 'Категория',
                    'value' => function (Pack $pack) {
                        return (!empty($pack->pack_category_id)) ? $pack->packCategory->category_pack_title : null;
                    },
                ],
            ],
        ])
        ?>
    </div>
</div>