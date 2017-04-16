<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Sp */

$this->title = 'Create Sp';
$this->params['breadcrumbs'][] = ['label' => 'Sps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
