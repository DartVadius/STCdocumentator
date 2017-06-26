<?php

use yii\helpers\Html;

$this->title = 'Сводный отчет';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['menu']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12 consolidated-statement">
        <?php if (!empty($aggregat)): ?>
            <p>
                <button id="print_button" class="glyphicon glyphicon-print btn btn-success"></button>
            </p>
            <div id="print">
                <h3>Сводная ведомость</h3>
                <table class="table table-bordered table-responsive table-striped table-condensed table-consolidated-statement">
                    <tr>
                        <th>Наименование продукции</th>
                        <th>Себест. <br> грн</th>
                        <th>Произв. <br> ед/час</th>
                        <th>Произв. <br> ед/см.</th>
                        <th>Рецептура</th>
                        <th>Вес <br> нетто <br> ед., кг</th>
                        <th>Масса <br> герм., кг</th>
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
                    <?php foreach ($aggregat as $group => $data): ?>
                        <?php if (!empty($data)): ?>
                            <tr><th><?= $group ?></th></tr>
                            <?php foreach ($data as $product): ?>
                                <tr>
                                    <td>
                                        <?= $product['name'] ?>
                                    </td>
                                    <td style="text-align: right">
                                        <?= $product['summ'] ?>
                                    </td>
                                    <td style="text-align: right">
                                        <?= $product['capacity_hour'] ?>
                                    </td>
                                    <td style="text-align: right">
                                        <?= $product['capacity_shift'] ?>
                                    </td>
                                    <td>
                                        <?= $product['recipe'] ?>
                                    </td>
                                    <td style="text-align: right">
                                        <?= $product['brutto'] ?>
                                    </td>
                                    <td style="text-align: right">
                                        <?= $product['sealant_weight'] ?>
                                    </td>
                                    <?php if (!empty($product['packs'])): ?>
                                        <?php $count = 1 ?>
                                        <?php foreach ($product['packs'] as $pack): ?>
                                            <td>
                                                <?= $pack['title'] ?>
                                            </td>
                                            <?php if ($count == 1): ?>
                                                <td style="text-align: right">
                                                    <?= $pack['capacity'] ?>
                                                </td>
                                            <?php else: ?>
                                                <td style="text-align: right">
                                                    <?= $pack['capacity'] / $tmp['capacity'] ?>
                                                </td>
                                            <?php endif; ?>
                                            <?php
                                            $count++;
                                            $tmp = $pack;
                                            ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>

            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function () {
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
    });

</script>