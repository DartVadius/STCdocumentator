<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $calculation->calculation_product_title;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = ['label' => 'Калькуляции', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Просмотр';
?>
<div class="row">
    <div class="col-lg-12">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $calculation->calculation_id], [
                'class' => 'btn btn-primary',
                'title' => 'Редактировать',
                ]) ?>
            <?=
            Html::a('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['delete', 'id' => $calculation->calculation_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
                'title' => 'Удалить',
            ])
            ?>
            
            <button id="print_button" class="glyphicon glyphicon-print btn btn-success" title="Печать"></button>
            <button id="export_button" class="glyphicon glyphicon-export btn btn-success" title="Выгрузить в Excel"></button>
        </p>
        <div id="print">
            <h2>Калькуляция <?= $calculation->calculation_product_title ?></h2>
            <h6>Дата: <?= $calculation->calculation_date ?></h6>

            <?=
            DetailView::widget([
                'model' => $calculation,
//                'options' => ['class' => 'table2excel table table-striped table-bordered detail-view'],
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
        $("#export_button").click(function () {
            $("#table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "export" //do not include extension
            });
        });
    });

</script>