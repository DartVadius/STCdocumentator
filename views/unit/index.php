<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ед.измерения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'unit_title',            
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Базовая единица',
                'value' => function ($data) {                    
                    $parent = (new yii\db\Query())
                            ->select(['unit_title'])
                            ->from('unit')
                            ->where("unit_id = $data->unit_parent_id")
                            ->column();                    
                    return $parent['0']; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
