<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = $model->unit_title;
$this->params['breadcrumbs'][] = ['label' => 'Ед.изм', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->unit_id;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 unit-view">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Изменить', ['update', 'id' => $model->unit_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'id' => $model->unit_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'label' => 'ID',
                    'value' => $model->unit_id
                ],
                [
                    'label' => 'Назание',
                    'value' => $model->unit_title
                ],
                [
                    'label' => 'Базова ед.изм',
                    'value' => $model->parent->unit_title,
                ],
                [
                    'label' => 'Коэффициент',
                    'value' => $model->unit_ratio
                ],
            ],
        ])
        ?>
    </div>
</div>