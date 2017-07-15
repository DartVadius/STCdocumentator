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
            <button id="export_button" class="glyphicon glyphicon-export btn btn-success"></button>
            <select style="float: right" id="page-size" class="btn btn-default">
                <option disabled="true" selected="true">зап.на стр.</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="500">500</option>
            </select>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Pack',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'pack_title',
                [
                    'attribute' => 'pack_price',
                    'label' => 'Цена',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->pack_price);
                    },
                    'contentOptions' => [
                        'data-field' => 'pack_price',
                        'style' => 'text-align:right'
                    ],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'pack_weight',
                    'label' => 'Вес упаковки, гр',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->pack_weight);
                    },
                    'contentOptions' => [
                        'data-field' => 'pack_weight',
                        'style' => 'text-align:right'
                    ],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'pack_delivery',
                    'label' => 'Доставка',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->pack_delivery);
                    },
                    'contentOptions' => [
                        'data-field' => 'pack_delivery',
                        'style' => 'text-align:right',
                        'width' => '100'
                    ],
                    'format' => 'raw',
                ],
                [
                    'label' => 'Цена с доставкой',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->pack_price + $model->pack_price * $model->pack_delivery / 100);
                    },
                    'contentOptions' => [
                        'style' => 'text-align:right'
                    ],
                ],
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
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>
<script>
    $(document).ready(function () {
        $("#export_button").click(function () {
            $("#Pack").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "export" //do not include extension
            });
        });
    });
</script>