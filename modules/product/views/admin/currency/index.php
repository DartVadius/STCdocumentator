<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\admin\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Валюта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 currency-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Добавить валюту', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-striped table-bordered table-hover table-condensed',
                'id' => 'Currency'
            ],
            'columns' => [
                'currency_code',
                [
                    'attribute' => 'currency_value',
                    'label' => 'Курс',
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDecimal($model->currency_value);
                    },
                    'contentOptions' => [
                        'data-field' => 'currency_value',
                        'style' => 'text-align:right'
                    ],
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
    </div>
</div>
<?php $this->registerJsFile('@web/js/edit_table.js'); ?>