<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\admin\OtherExpenses */

$this->title = 'Добавить статью затрат';
$this->params['breadcrumbs'][] = ['label' => 'Прочие затраты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 other-expenses-create">
        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>
    </div>
</div>