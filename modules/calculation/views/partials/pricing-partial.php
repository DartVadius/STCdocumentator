<?php

use app\modules\calculation\models\CalculationAggregator;
use app\modules\product\models\admin\Product;

$productModel = new Product();
?>
<?php if (!empty($data)): ?>
    <div id="print">
        <table id="table2excel" class="table table-bordered table-responsive table-striped table-condensed table-consolidated-statement">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Производительность линии, уч.ед./смена</th>
                    <th>Себестоимость, грн</th>
                    <?php if ($step_count > 0): ?>
                        <?php $header_profit = $profit ?> 
                        <?php for ($i = 1; $i <= $step_count; $i++): ?>
                            <th>Плановая прибыль: <?= $header_profit ?> грн</th>
                            <?php $header_profit += $step ?>
                        <?php endfor; ?>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value): ?>
                    <!-- start Таблица калькуляций -->
                    <tr>
                        <td><h3><?= $key ?></h3></td>
                        <td></td><td></td><td></td>
                        <?php if ($step_count > 0): ?>
                            <?php for ($i = 1; $i < $step_count; $i++): ?>
                                <td></td>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </tr>
                    <?php foreach ($value as $product): ?>
                        <tr>
                            <td><?= $product->params->title ?></td>
                            <td style="text-align: right"><?= number_format($product->params->capacity * $shift, 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($product->summ(), 2, ',', '') ?></td>
                            <?php if ($step_count > 0): ?>
                                <?php $cell_profit = $profit; ?>
                                <?php for ($i = 1; $i <= $step_count; $i++): ?>
                                    <td style="text-align: right"><?= number_format($cell_profit / ($product->params->capacity * $shift) + $product->summ(), 2, ',', '') ?></td>
                                    <?php $cell_profit += $step ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </tr>

                    <?php endforeach; ?>
                    <!-- end Таблица калькуляций -->
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