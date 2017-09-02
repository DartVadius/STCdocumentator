<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Pack */

$this->title = 'Редактировать упаковку: ' . $model->pack_title;
$this->params['breadcrumbs'][] = ['label' => 'Упаковка', 'url' => ['index']];
if (!empty($model->pack_category_id)) {
    $this->params['breadcrumbs'][] = ['label' => $model->packCategory->category_pack_title, 'url' => ['index', 'pack_category_id' => $model->pack_category_id]];
}
$this->params['breadcrumbs'][] = ['label' => $model->pack_title, 'url' => ['view', 'id' => $model->pack_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 pack-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
