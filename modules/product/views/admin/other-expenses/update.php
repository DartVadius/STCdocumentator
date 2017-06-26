<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\OtherExpenses */

$this->title = 'Редактировать статью затрат: ' . $model->other_expenses_title;
$this->params['breadcrumbs'][] = ['label' => 'Прочие затраты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->other_expenses_title, 'url' => ['view', 'id' => $model->other_expenses_id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-lg-12 other-expenses-update">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>