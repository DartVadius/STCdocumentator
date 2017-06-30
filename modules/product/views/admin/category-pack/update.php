<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\CategoryPack */

$this->title = 'Редактировать категорию упаковки: ' . $model->category_pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Категории упаковки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_pack_id, 'url' => ['view', 'id' => $model->category_pack_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="category-pack-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
