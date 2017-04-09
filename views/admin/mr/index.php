<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы в рецептурах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>       
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [            
            'mr_id',
            'mr_percentage',            
            [
                'attribute' => 'mr_recipe_id',                
                'label' => 'Рецептура',
                'value' => 'mrRecipe.recipe_title',
            ],
            [
                'attribute' => 'mr_material_id',                
                'label' => 'Материал',
                'value' => 'mrMaterial.material_title',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
