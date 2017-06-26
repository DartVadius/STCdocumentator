<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mr */

$this->title = 'Редактировать материал в: ' . $model->mrRecipe->recipe_title;
$this->params['breadcrumbs'][] = ['label' => $model->mrRecipe->recipe_title, 'url' => ['admin/recipe/view', 'id' => $model->mr_recipe_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 mr-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/product_admin_mr.js'); ?>