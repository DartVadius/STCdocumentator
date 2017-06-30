<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\CategoryPack */

$this->title = 'Добавить категорию упаковки';
$this->params['breadcrumbs'][] = ['label' => 'Категории упаковки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-pack-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
