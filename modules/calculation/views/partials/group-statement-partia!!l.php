<?php

use app\modules\calculation\models\CalculationAggregator;
?>
<?php if (!empty($data)): ?>
    <?php foreach ($data as $value): ?>
        <?php foreach ($value as $group => $products): ?>
            <h2><?= $group ?></h2>
            <?php $count = 0; ?>
            <?php $count = CalculationAggregator::findMaxPacksCount($value); ?>
            <table>
                <tr>
                    <th>Наименование</th>
                    <th>L, мм</th>
                    <th>Производительность, ед./смена</th>
                    <?php if ($count > 0): ?>
                        <?php for ($i = 1; $i <= $count; $i++): ?>
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
                    <th>Вес нетто, кг</th>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php else: ?>
    <h2>Нет данных для отбора, проверьте настройку фильтра</h2>
<?php endif; ?>