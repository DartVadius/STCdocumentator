<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\product\models\admin\Pma */

$this->title = 'Добавить вспомогательный материал';
$this->params['breadcrumbs'][] = ['label' => $model->pmaProduct->product_title, 'url' => ['admin/product/view', 'id' => $model->pma_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 pma-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/product_admin_pma.js'); ?>