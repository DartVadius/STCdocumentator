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
            ['class' => 'yii\grid\SerialColumn'],
            'material_id',
            'material_title',
            'materil_price',
            'material_article',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Категория',
                'value' => function ($data) {
                    $parent = (new yii\db\Query())
                            ->select(['category_title'])
                            ->from('category')
                            ->where("category_id = $data->material_category_id")
                            ->column();
                    return $parent['0']; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Ед.изм.',
                'value' => function ($data) {
                    $parent = (new yii\db\Query())
                            ->select(['unit_title'])
                            ->from('unit')
                            ->where("unit_id = $data->material_unit_id")
                            ->column();
                    return $parent['0']; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
