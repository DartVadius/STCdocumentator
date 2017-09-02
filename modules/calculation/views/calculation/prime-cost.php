<?php

use kartik\date\DatePicker;

$this->title = 'Анализ себестоимости';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile("@web/css/hw.datepicker.css", [
//    'depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<div class="row">
    <button id="hide-show" class="glyphicon glyphicon-minus-sign glyphicon-eye-close btn btn-success small"></button>
    <button id="print_button" class="glyphicon glyphicon-print btn btn-success"></button>
    <button id="export_button" class="glyphicon glyphicon-export btn btn-success"></button>
</div>
<br>

<div id="filter">
    <?php if (!empty($categories)): ?>
        <form id="form-statement" method="POST" name="group-aggregat" class="form-group">

            <input type="checkbox" id="select-all" name="select-all" value="0"><label name="select-all">&nbsp;Выделить все / убрать выделение</label>
            <br>
            <?php
            $count = floor(count($categories) / 2);
            $category_col1 = array_slice($categories, 0, $count + 1);
            $category_col2 = array_slice($categories, $count + 1);
            ?>
            <div class="row">
                <div class="col-lg-4">
                    <?php foreach ($category_col1 as $value): ?>
                        <input type="checkbox" id="<?= $value['category_product_id'] ?>" name="category[]" value="<?= $value['category_product_id'] ?>"><label name="[category][<?= $value['category_product_title'] ?>]">&nbsp;<?= $value['category_product_title'] ?></label><br>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-4">
                    <?php foreach ($category_col2 as $value): ?>
                        <input type="checkbox" id="<?= $value['category_product_id'] ?>" name="category[]" value="<?= $value['category_product_id'] ?>"><label name="[category][<?= $value['category_product_title'] ?>]">&nbsp;<?= $value['category_product_title'] ?></label><br>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-4">
                    <input type="checkbox" name="last-calc" value="1" checked="true"><label name="last-calc">&nbsp;Только последенюю себестоимость</label>
                    <h4>Период 1</h4>
                    <?php
                    echo DatePicker::widget([
                        'language' => 'ru',
                        'size' => 'sm',
                        'name' => 'from_date_start',
//                'value' => date('Y-m-d'),
                        'type' => DatePicker::TYPE_RANGE,
                        'name2' => 'to_date_start',
//                'value2' => date('Y-m-d'),
                        'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                        'options' => [
                            'placeholder' => 'От',
                        ],
                        'options2' => ['placeholder' => 'До'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                        ]
                    ]);
                    ?>
                    <h4>Период 2</h4>
                    <?php
                    echo DatePicker::widget([
                        'language' => 'ru',
                        'size' => 'sm',
                        'name' => 'from_date_end',
//                'value' => date('Y-m-d'),
                        'type' => DatePicker::TYPE_RANGE,
                        'name2' => 'to_date_end',
//                'value2' => date('Y-m-d'),
                        'options' => ['placeholder' => 'От'],
                        'options2' => ['placeholder' => 'До'],
                        'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-mm-yyyy',
                        ]
                    ]);
                    ?>

                    <input type="text" name="partial" hidden="true" value="prime-cost-partial">
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button id="send" class="btn btn-success">Сформировать</button>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

<div id="ajax-response">

</div>
<?php // $this->registerJsFile('@web/js/hw.datepicker.js');   ?>
<script>
    $(document).ready(function () {
        $('#send').click(function (e) {
            e.preventDefault();
            $('#ajax-response').empty();
            var c = $('#form-statement').serialize();
            var data = {
                data: c
            };
            $.ajax({
                url: "/calculation/ajax/partial-statistic-prime-cost",
                type: "POST",
                data: data,
                success: function (response) {
                    $('#ajax-response').html(response);
                }
            });
        });
        $('#hide-show').click(function () {
            if ($('#hide-show').hasClass('glyphicon-minus-sign')) {
                $('#hide-show').removeClass('glyphicon-minus-sign');
                $('#hide-show').addClass('glyphicon-plus-sign');
                $('#filter').hide();
            } else {
                $('#hide-show').removeClass('glyphicon-plus-sign');
                $('#hide-show').addClass('glyphicon-minus-sign');
                $('#filter').show();
            }
            ;
        });
        $('#select-all').change(function () {
            if ($("#select-all").prop("checked")) {
                $("input[type=checkbox]").prop('checked', true);
            } else {
                $("input[type=checkbox]").prop('checked', false);
            }
        });
        $('#print_button').click(function (e) {
            e.preventDefault();
            var printing_css = '<style media="print">table {border-collapse: collapse} td, th {border:0.2px solid grey;} th {text-align: center} th, td {font-size: 75%;}</style>';
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