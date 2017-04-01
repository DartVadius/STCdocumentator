<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать Материал', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [            
            'material_id',
            'material_title',
            'material_price',
            'material_article',
            [
                'attribute' => 'material_category_id',
                'label' => 'Категория',
                'value' => function (app\models\Material $material) {
                    return $material->materialCategory->category_title;
                },
            ],
            [
                'attribute' => 'material_unit_id',                
                'label' => 'Ед.изм.',
                'value' => function (app\models\Material $material) {
                    return $material->materialUnit->unit_title;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
