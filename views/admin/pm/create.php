<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\admin\Pm */

$this->title = 'Create Pm';
$this->params['breadcrumbs'][] = ['label' => 'Pms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
