<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mr */

$this->title = 'Добавить Материал';
$this->params['breadcrumbs'][] = ['label' => 'Рецептуры', 'url' => ['admin/recipe/view', 'id' => $model->mr_recipe_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 mr-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/product_admin_mr.js'); ?>