<?php

use yii\helpers\Html;

//$this->registerCssFile("@web/css/tablesorter/jquery.dataTables.css");

$this->title = 'Сводный отчет';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 consolidated-statement">
        <?php if (!empty($aggregat)): ?>
            <p>
                <button id="print_button" class="glyphicon glyphicon-print btn btn-success"></button>
                <button id="export_button" class="glyphicon glyphicon-export btn btn-success"></button>
            </p>
            <div id="print">
                <h3>Сводный отчет</h3>
                <table id="table2excel" class="table table-bordered table-responsive table-striped table-condensed table-consolidated-statement">
                    <thead>
                        <tr>
                            <th>Наименование продукции</th>
                            <th>Себест. грн</th>
                            <th>Произв. ед/час</th>
                            <th>Произв. ед/см.</th>
                            <th>Рецептура</th>
                            <th>Вес нетто ед., кг</th>
                            <th>Масса герм., кг</th>
                            <?php if ($pack_count > 0): ?>
                                <?php for ($i = 1; $i <= $pack_count; $i++): ?>
                                    <th>Уп. <?= $i ?></th>
                                    <?php if ($i == 1): ?>
                                        <th style="width: 60px">Кол-во в уп.</th>
                                    <?php else: ?>
                                        <th style="width: 60px">
                                            Кол-во уп.<?= $i - 1 ?> в уп. <?= $i ?>
                                        </th>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aggregat as $group => $data): ?>
                            <?php if (!empty($data)): ?>
                                <tr>
                                    <td><h4><?= $group ?></h4></td>
                                    <td></td><td></td><td></td><td></td><td></td><td></td>
                                    <?php if ($pack_count > 0): ?>
                                        <?php for ($i = 1; $i <= $pack_count; $i++): ?>
                                            <td></td><td></td>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                </tr>
                                <?php foreach ($data as $product): ?>
                                    <tr>
                                        <td>
                                            <?= $product['name'] ?>
                                        </td>
                                        <td style="text-align: right">
                                            <?= number_format($product['summ'], 2, ',', '') ?>
                                        </td>
                                        <td style="text-align: right">
                                            <?= number_format($product['capacity_hour'], 2, ',', '') ?>
                                        </td>
                                        <td style="text-align: right">
                                            <?= number_format($product['capacity_shift'], 2, ',', '') ?>
                                        </td>
                                        <td>
                                            <?= $product['recipe'] ?>
                                        </td>
                                        <td style="text-align: right">
                                            <?= number_format($product['brutto'], 3, ',', '') ?>
                                        </td>
                                        <td style="text-align: right">
                                            <?= number_format($product['sealant_weight'], 3, ',', '') ?>
                                        </td>
                                        <?php $count = 1 ?>
                                        <?php if (!empty($product['packs'])): ?>
                                            <?php foreach ($product['packs'] as $pack): ?>
                                                <td>
                                                    <?= $pack['title'] ?>
                                                </td>
                                                <?php if ($count == 1): ?>
                                                    <td style="text-align: right">
                                                        <?= number_format($pack['capacity'], 0, ',', '') ?>
                                                    </td>
                                                <?php else: ?>
                                                    <td style="text-align: right">
                                                        <?= number_format($pack['capacity'] / $tmp['capacity'], 0, ',', '') ?>
                                                    </td>
                                                <?php endif; ?>
                                                <?php
                                                $count++;
                                                $tmp = $pack;
                                                ?>
                                            <?php endforeach; ?>

                                        <?php endif; ?>
                                        <?php $td = $pack_count - $count + 1; ?>
                                        <?php if ($td > 0): ?>
                                            <?php for ($i = 1; $i <= $td; $i++): ?>
                                                <td></td><td></td>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php // $this->registerJsFile('@web/js/tablesorter/sortable.js'); ?>
<script>

    $(document).ready(function () {
        $('#table2excel').DataTable({
            paging: false,
            ordering: false,
            language: {
                search: "Искать:",
                info: "Найдено _TOTAL_ элементов",
                infoFiltered: "(всего записей:_MAX_)"
            }
        });
        $('#print_button').click(function (e) {
            e.preventDefault();
            var printing_css = '<style media="print">table {border-collapse: collapse} td, th {border:0.2px solid grey;} th {text-align: center} h2, th, td {font-size: 75%;}</style>';
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