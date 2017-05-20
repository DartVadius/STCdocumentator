<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = $model->position_title;
$this->params['breadcrumbs'][] = ['label' => 'Должности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/modules/product/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 position-view">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->position_id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Удалить', ['delete', 'id' => $model->position_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверенны?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'position_id',
                'position_title',
                'position_desc',
                'position_salary_hour',
            ],
        ])
        ?>
    </div>
</div>