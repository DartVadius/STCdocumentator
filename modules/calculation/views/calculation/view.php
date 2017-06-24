<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $calculation->calculation_product_title;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = ['label' => 'Калькуляции', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Просмотр';
?>
<div class="row">
    <div class="col-lg-3">
        <?= $this->render('@app/views/partials/side_menu') ?>
    </div>
    <div class="col-lg-9 ">
        <p>
            <?=
            Html::a('Удалить', ['delete', 'id' => $calculation->calculation_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ])
            ?>
            <?= Html::a('Редактировать', ['update', 'id' => $calculation->calculation_id], ['class' => 'btn btn-primary']) ?>
            <button id="print_button" class="glyphicon glyphicon-print btn btn-success"></button>
        </p>
        <div id="print">
            <h2>Калькуляция <?= $calculation->calculation_product_title ?></h2>
            <h6>Дата: <?= $calculation->calculation_date ?></h6>

            <?=
            DetailView::widget([
                'model' => $calculation,
                'attributes' => [
                    'calculation_note',
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
                    'calculation_archive:boolean',
                ],
            ])
            ?>
            <br>
            <?= $this->render('@app/modules/calculation/views/partials/calculation_static_part', ['calculation' => $calculation]) ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#print_button').click(function (e) {
            e.preventDefault();
            var printing_css = '<style media="print">table {border-collapse: collapse} td, th {border:0.2px solid grey;} th {text-align: left} h2, th, td {font-size: 75%;}</style>';
            var html = printing_css + $('#print').html();
            var iframe = $('<iframe id="print_frame">');
            $('body').append(iframe);
            var doc = $('#print_frame')[0].contentDocument || $('#print_frame')[0].contentWindow.document;
            var win = $('#print_frame')[0].contentWindow || $('#print_frame')[0];
            doc.getElementsByTagName('body')[0].innerHTML = html;
            win.print();
            $('iframe').remove();
        });
    });

</script>