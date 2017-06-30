<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\CategoryPack */

$this->title = $model->category_pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Категории упаковки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-pack-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->category_pack_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->category_pack_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_pack_id',
            'category_pack_title',
            'category_pack_desc',
        ],
    ]) ?>

</div>
