<?php

use app\modules\calculation\models\CalculationAggregator;
use app\modules\product\models\admin\Product;
$productModel = new Product();
?>
<?php if (!empty($data)): ?>
    <div id="print">
        <table id="table2excel" class="table table-bordered table-responsive table-striped table-condensed table-consolidated-statement">
            <?php foreach ($data as $key => $value): ?>
                <!-- start Таблица калькуляций -->
                <tr>
                    <td style="border: none"><h2><?= $key ?></h2></td>
                </tr>
                <?php foreach ($value as $product): ?>
                    <?php // print_r($product);  ?>
                    <tr>
                        <th><?= $product->params->title ?></th>
                    </tr>
                    <tr>
                        <th>Статья затрат</th>
                        <th>Ед.изм.</th>
                        <th>Цена, грн</th>
                        <th>Расход на ед.пр.</th>
                        <th>Сумма, грн</th>
                    </tr>
                    <?php if (!empty($product->recipe->get())): ?>
                        <tr>
                            <td>Герметик</td>
                            <td>кг</td>
                            <td style="text-align: right"><?= number_format($product->recipe->summ() / $product->recipe->getNetto(), 2, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($product->recipe->getNetto(), 4, ',', '') ?></td>
                            <td style="text-align: right"><?= number_format($product->recipe->summ(), 2, ',', '') ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($product->materials->get())): ?>
                        <?php foreach ($product->materials->get() as $material): ?>
                            <tr>
                                <td><?= $material['title'] ?></td>
                                <td><?= $material['unit'] ?></td>
                                <td style="text-align: right"><?= number_format($material['price'], 2, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format($material['quantity'], 4, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format(app\modules\classes\MyFunctions::plusPercent($material['summ'], $material['loss']), 2, ',', '') ?></td>
                                <?php if ($material['loss'] > 0): ?>
                                    <td style="text-align: right"> + <?= number_format($material['loss'], 2, ',', '') ?> %</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php // print_r($product); ?>
                    <?php if (!empty($product->materialsAdditional->get())): ?>
                        <?php foreach ($product->materialsAdditional->get() as $material): ?>
                            <tr>
                                <td><?= $material['title'] ?></td>
                                <td><?= $material['unit'] ?></td>
                                <td style="text-align: right"><?= number_format($material['price'], 2, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format($material['quantity'], 4, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format(app\modules\classes\MyFunctions::plusPercent($material['summ'], $material['loss']), 2, ',', '') ?></td>
                                <?php if ($material['loss'] > 0): ?>
                                    <td style="text-align: right"> + <?= number_format($material['loss'], 2, ',', '') ?> %</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($product->packs->get())): ?>
                        <?php foreach ($product->packs->get() as $pack): ?>
                            <tr>
                                <td><?= $pack['title'] ?></td>
                                <td>шт</td>
                                <td style="text-align: right"><?= number_format($pack['price'], 2, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format(1 / $pack['capacity'], 4, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format($pack['value'], 2, ',', '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($product->expenses->get())): ?>
                        <?php foreach ($product->expenses->get() as $expense): ?>
                            <tr>
                                <td><?= $expense['title'] ?></td>
                                <td>грн/час</td>
                                <td style="text-align: right"><?= number_format($expense['value_per_hour'], 2, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format($expense['summ'], 2, ',', '') ?></td>
                                <td style="text-align: right"><?= number_format($expense['summ'], 2, ',', '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($product->positions->get())): ?>
                        <tr>
                            <td>Зарплата</td>
                            <td></td>
                            <td style="text-align: right"></td>
                            <td style="text-align: right"></td>
                            <td style="text-align: right"><?= number_format($product->positions->summ(), 2, ',', '') ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($product->losses->get())): ?>
                        <tr>
                            <td>Плановые потери</td>
                            <td></td>
                            <td style="text-align: right"></td>
                            <td style="text-align: right"></td>
                            <td style="text-align: right"><?= number_format($product->losses->summ(), 2, ',', '') ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th style="text-align: left">Всего</th>
                        <th style="text-align: left">грн</th>
                        <th></th>
                        <th></th>
                        <th style="text-align: right"><?= number_format($product->summ(), 2, ',', '') ?></th>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr>
                        <th>Цена реализации</th>
                        <th>Себест.</th>
                        <th>Произв.линии</th>
                        <th>Валовая прибыль, грн/смена</th>
                    </tr>
                    <tr>
                        <?php
                        $price = $productModel->find()->where(['product_id' => $product->params->product_id])->one()->product_price;                        
                        ?>
                        <td style="text-align: center"><?= number_format($price, 2, ',', '') ?></td>
                        <td style="text-align: center"><?= number_format($product->summ(), 2, ',', '') ?></td>
                        <td style="text-align: center"><?= number_format($product->params->capacity, 2, ',', '') ?></td>
                        <td style="text-align: center"><?= number_format(($price - $product->summ()) * $product->params->capacity * $shift, 2, ',', '')?></td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                <?php endforeach; ?>
                <!-- end Таблица калькуляций -->
            <?php endforeach; ?>
        </table>
    </div>
<?php else: ?>
    <h2>Нет данных для отбора, проверьте настройку фильтра</h2>
<?php endif; ?>