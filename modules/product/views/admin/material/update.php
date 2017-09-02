<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Material */

$this->title = 'Редактировать Материал: ' . $model->material_title;
$this->params['breadcrumbs'][] = ['label' => 'Материалы', 'url' => ['index']];
if (!empty($model->material_category_id)) {
    $this->params['breadcrumbs'][] = ['label' => $model->materialCategory->category_title, 'url' => ['index', 'material_category_id' => $model->material_category_id]];
}
$this->params['breadcrumbs'][] = ['label' => $model->material_title, 'url' => ['view', 'id' => $model->material_id]];
?>
<div class="row">
    <div class="col-lg-12 material-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>