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
                    <th>Цена розничная, грн</th>
                    <th>Скидка, %</th>
                    <th>Цена розничная со скидкой, грн</th>
                    <th>Производительность линии, уч.ед./смена</th>
                    <th>Себестоимость, грн</th>
                    <th>Прибыль, грн/смена</th>
                    <th>Прибыль со скидкой, грн/смена</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value): ?>
                    <!-- start Таблица калькуляций -->
                    <tr>
                        <td style="border: none"><h3><?= $key ?></h3></td>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>

                    <?php foreach ($value as $product): ?>
                        <tr>
                            <td><?= $product->params->title ?></td>
                            <?php
                            $price = $productModel->find()->where(['product_id' => $product->params->product_id])->one()->product_price;
                            ?>
                            <td style="text-align: right"><?= number_format($price, 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($discount, 2, ',', '') ?> %</td>
                            <td style="text-align: right"><?= number_format($price - $price / 100 * $discount, 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($product->params->capacity * $shift, 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($product->summ(), 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format(($price - $product->summ()) * $product->params->capacity * $shift, 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format(($price - $price / 100 * $discount - $product->summ()) * $product->params->capacity * $shift, 2, ',', '') ?></td>
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