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
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-condensed'
        ],
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],
            'material_title',
            'material_price',
            'material_article',
            [
                'attribute' => 'material_category_id',
                'label' => 'Категория',
                'value' => 'materialCategory.category_title',
                'filter' => app\models\admin\Category::find()->select(['category_title', 'category_id'])->indexBy('category_id')->column(),
            ],
            [
                'attribute' => 'material_unit_id',                
                'label' => 'Ед.изм.',
                'value' => 'materialUnit.unit_title',
                'filter' => app\models\admin\Unit::find()->select(['unit_title', 'unit_id'])->indexBy('unit_id')->column(),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '100'],
            ],
        ],
    ]);
    ?>
</div>
