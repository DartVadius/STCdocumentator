<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\product\models\admin\Category;
use app\modules\product\models\admin\Unit;
use yii\i18n\Formatter;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 material-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать Материал', ['create'], ['class' => 'btn btn-success']) ?>
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
                'id' => 'Material'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'material_title',
                [
                    'attribute' => 'material_price',
                    'label' => 'Цена',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->material_price);
                    },
                    'contentOptions' => [
                        'data-field' => 'material_price',
                        'style' => 'text-align:right'
                    ],
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'material_currency_type',
                    'label' => 'Валюта',
                    'value' => 'materialCurrencyType.currency_code',
                    'headerOptions' => ['width' => '100'],
                ],
                [
                    'attribute' => 'material_unit_id',
                    'label' => 'Ед.изм.',
                    'value' => 'materialUnit.unit_title',
                    'headerOptions' => ['width' => '100'],
                ],
                [
                    'attribute' => 'material_delivery',
                    'label' => 'Доставка',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->material_delivery);
                    },
                    'contentOptions' => [
                        'data-field' => 'material_delivery',
                        'style' => 'text-align:right',
                        'width' => '100'
                    ],
                    'format' => 'raw',
                ],
                [
                    'label' => 'Цена с доставкой',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->material_price + $model->material_price * $model->material_delivery / 100);
                    },
                    'contentOptions' => [
                        'style' => 'text-align:right'
                    ],
                ],
                'buying_date',
                [
                    'attribute' => 'material_category_id',
                    'label' => 'Категория',
                    'value' => 'materialCategory.category_title',
                    'filter' => Category::find()->select(['category_title', 'category_id'])->indexBy('category_id')->column(),
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
</div>
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>
<script>
    $(document).ready(function () {
        $("#export_button").click(function () {
            $("#Material").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "export" //do not include extension
            });
        });
    });
</script>