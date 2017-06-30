<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\admin\CategoryPackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории упаковки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-pack-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить категорию упаковки', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [
//            'category_pack_id',
            'category_pack_title',
            'category_pack_desc',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
            ],
        ],
    ]);
    ?>
</div>
