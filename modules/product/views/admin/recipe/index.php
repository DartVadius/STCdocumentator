<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\admin\RecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рецептуры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 recipe-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Добавить Рецептуру', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <div class="table-responsive">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-hover table-condensed'
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'recipe_title',
                    'recipe_date',
                    'recipe_update',
                    'recipe_note:ntext',
                    [
                        'attribute' => 'recipe_approved',
                        'label' => 'Утверждено',
                        'value' => function ($model) {
                            if ($model->recipe_approved === 0) {
                                return 'нет';
                            }
                            return 'да';
                        },
                        'filter' => ['нет', 'да'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'headerOptions' => ['width' => '100'],
                        'template' => '{view}&nbsp;&nbsp;{delete}',
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>