<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solution */

$this->title = $model->solution_title;
$this->params['breadcrumbs'][] = ['label' => 'Решения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 solution-view">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->solution_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'id' => $model->solution_id], [
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
                'solution_id',
                'solution_title',
                [
                    'attribute' => 'solution_desc',
                    'label' => 'Описание решения',
                    'value' => $model->solution_desc,
                    'format' => 'raw'
                ],
            ],
        ])
        ?>
    </div>
</div>