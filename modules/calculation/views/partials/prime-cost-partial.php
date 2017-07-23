<?php

use app\modules\product\models\admin\Product;

$productModel = new Product();
?>
<?php if (!empty($data)): ?>
    <div id="print">
        <h4>Сравнительный анализ себестоимости по периодам</h4>
        <table id="table2excel" class="table table-bordered table-responsive table-striped table-condensed table-consolidated-statement">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th><?= $from ?> <br> грн</th>
                    <th><?= $to ?> <br> грн</th>
                    <th>Коэффициент изменения</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $brand => $product): ?>
                    <tr>
                        <th style="text-align: left"><?= $brand ?></th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php foreach ($product as $name => $value): ?>
                        <tr>
                            <td>
                                <?= $name ?>
                            </td>
                            <?php if (!empty($lastCalc)): ?>

                                <td style="text-align: right">
                                    <?php
                                    if (!empty($value['start'])) {
                                        $arg1 = end($value['start']);
                                    } else {
                                        $arg1 = 0;
                                    }
                                    ?>
                                    <?= number_format($arg1, 2, ',', '') ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    if (!empty($value['end'])) {
                                        $arg2 = end($value['end']);
                                    } else {
                                        $arg2 = 0;
                                    }
                                    ?>
                                    <?= number_format($arg2, 2, ',', '') ?>
                                </td>
                                <?php
                                if (empty($value['start'])) {
                                    $arg1 = 0;
                                } else {
                                    $arg1 = end($value['start']);
                                }
                                if (empty($value['end'])) {
                                    $arg1 = 1;
                                    $arg2 = 1;
                                } else {
                                    $arg2 = end($value['end']);
                                }
                                ?>
                                <td style="text-align: right">
                                    <?= number_format($arg1 / $arg2, 2, ',', '') ?>
                                </td>
                            <?php else: ?>
                                <td style="text-align: right">
                                    <?php if (!empty($value['start'])): ?>
                                        <?php foreach ($value['start'] as $cost): ?>
                                            <?= number_format($cost, 2, ',', '') ?><br>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?>

                                </td>
                                <td style="text-align: right">
                                    <?php if (!empty($value['end'])): ?>
                                        <?php foreach ($value['end'] as $cost): ?>
                                            <?= number_format($cost, 2, ',', '') ?><br>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: right">
                                    <?php
                                    if (empty($value['start'])) {
                                        $arg1 = 0;
                                    } else {
                                        $arg1 = $value['start'][0];
                                    }
                                    if (empty($value['end'])) {
                                        $arg1 = 1;
                                        $arg2 = 1;
                                    } else {
                                        $arg2 = $value['end'][0];
                                    }
                                    ?>
                                    По первому значению: <?= number_format($arg1 / $arg2, 2, ',', '') ?>
                                    <br>
                                    <?php
                                    if (empty($value['start'])) {
                                        $arg1 = 0;
                                    } else {
                                        $arg1 = end($value['start']);
                                    }
                                    if (empty($value['end'])) {
                                        $arg1 = 1;
                                        $arg2 = 1;
                                    } else {
                                        $arg2 = end($value['end']);
                                    }
                                    ?>
                                    По последнему значению: <?= number_format($arg1 / $arg2, 2, ',', '') ?>
                                    <br>
                                    По среднему значению:
                                    <?php
                                    if (empty($value['start'])) {
                                        $arg1 = 0;
                                    } else {
                                        $arg1 = array_sum($value['start']) / count($value['start']);
                                    }
                                    if (empty($value['end'])) {
                                        $arg1 = 1;
                                        $arg2 = 1;
                                    } else {
                                        $arg2 = array_sum($value['end']) / count($value['end']);
                                    }
                                    ?>
                                    <?=
                                    number_format($arg1 / $arg2, 2, ',', '')
                                    ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h2>Нет данных для отбора, проверьте настройку фильтра</h2>
<?php endif; ?>
<script>
    $('#table2excel').DataTable({
        paging: false,
        ordering: false,
        language: {
            search: "Искать:",
            info: "Найдено _TOTAL_ элементов",
            infoFiltered: "(всего записей:_MAX_)"
        }
    });
</script>