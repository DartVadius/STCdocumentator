<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */

$this->title = 'Редактировать материал в : ' . $model->pmProduct->product_title;
$this->params['breadcrumbs'][] = ['label' => $model->pmProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pm_product_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 pm-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/product_admin_pm.js'); ?>