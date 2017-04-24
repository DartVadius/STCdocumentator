<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\admin\Lp */

$this->title = $model->lp_id;
$this->params['breadcrumbs'][] = ['label' => 'Lps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lp_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lp_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lp_id',
            'lp_loss_id',
            'lp_product_id',
            'lp_percentage',
        ],
    ]) ?>

</div>
