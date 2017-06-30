<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\product\models\admin\CategoryPack;
use app\modules\product\models\admin\CategoryProduct;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Упаковка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 pack-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Добавить упаковку', ['create'], ['class' => 'btn btn-success']) ?>
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
                'pack_title',
                'pack_price',
                'pack_weight',
                [
                    'attribute' => 'pack_category_id',
                    'label' => 'Категория',
                    'value' => 'packCategory.category_pack_title',
                    'filter' => CategoryPack::find()->select(['category_pack_title', 'category_pack_id'])->indexBy('category_pack_id')->column(),
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
</div>