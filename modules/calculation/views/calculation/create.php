<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Калькуляция ' . $calculation->calculation_product_title;
$this->params['breadcrumbs'][] = ['label' => $calculation->calculation_product_title, 'url' => ['../product/admin/product/view', 'id' => $calculation->calculation_product_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="row">            
            <div class="col-lg-12">
                <div class="calculation-create">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php if (!empty($msg)): ?>
                    <p class="alert alert-danger"><?=$msg?></p>
                    <?php endif; ?>
                    <?= $this->render('_form', ['calculation' => $calculation,]) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?=
                DetailView::widget([
                    'model' => $calculation,
                    'attributes' => [
                        [
                            'attribute' => 'calculation_product_capacity_hour',
                            'label' => 'Выработка в час (учетная единица: ' . $calculation->calculation_unit . ')',
                            'value' => $calculation->calculation_product_capacity_hour,
                        ],
                        'calculation_weight',
                        [
                            'label' => 'Размеры, мм (длина/ширина/толщина)',
                            'value' => function ($calculation) {
                                $size = NULL;
                                if (empty($calculation->calculation_length)) {
                                    $size = 'не задано / ';
                                } else {
                                    $size = $calculation->calculation_length . ' / ';
                                }
                                if (empty($calculation->calculation_width)) {
                                    $size .= 'не задано / ';
                                } else {
                                    $size .= $calculation->calculation_width . ' / ';
                                }
                                if (empty($calculation->calculation_thickness)) {
                                    $size .= 'не задано';
                                } else {
                                    $size .= $calculation->calculation_thickness;
                                }
                                return $size;
                            },
                        ],
                    ],
                ])
                ?>
                <?= $this->render('@app/modules/calculation/views/partials/calculation_static_part', ['calculation' => $calculation]) ?>
            </div>
        </div>
    </div>
</div>
