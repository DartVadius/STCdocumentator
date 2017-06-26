<table class="table table-bordered table-responsive table-striped table-condensed">

    <?php if (!empty($calculation->calculation_recipe_data)): ?>
        <?php $recipeMaterials = unserialize($calculation->calculation_recipe_data); ?>
        <tr>
            <th>Герметик (<?= $recipeMaterials->getTitle() ?>)</th>
            <th style="text-align: center">Ед.изм.</th>
            <th style="text-align: center">Количество</th>
            <th style="text-align: center">Цена</th>
            <th style="text-align: center">Сумма</th>
        </tr>

        <?php if (!empty($recipeMaterials->get())): ?>
            <?php $recipe_weight = 0 ?>
            <?php foreach ($recipeMaterials->get() as $material): ?>
                <?php $recipe_weight += $material['quantity']; ?>
                <tr>
                    <td><?= $material['title'] ?></td>
                    <td style="text-align: right"><?= $material['unit'] ?></td>
                    <td style="text-align: right"><?= round($material['quantity'], 4) ?> / <?= $material['%'] ?> %</td>
                    <td style="text-align: right"><?= round($material['price'], 2) ?></td>
                    <td style="text-align: right"><?= round($material['summ'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><td></td><td></td><td></td><td></td><td></td></tr>
        <tr>
            <th>Итого герметика на ед.продукции</th>
            <td style="text-align: right">кг</td>
            <th style="text-align: right"><?= round($recipe_weight, 4) ?> / <?= $recipeMaterials->getPercent() ?> %</th>
            <th style="text-align: right"><?= round(($recipeMaterials->summ() / $recipe_weight), 2); ?></th>
            <th style="text-align: right"><?= round($recipeMaterials->summ(), 2) ?></th>
        </tr>
        
        <?php endif; ?>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>
    <?php if (!empty($calculation->calculation_materials_data)): ?>
        <?php $materials = unserialize($calculation->calculation_materials_data) ?>            
        <tr>
            <th>Материалы</th>
            <th style="text-align: center">Ед.изм.</th>
            <th style="text-align: center">Количество</th>
            <th style="text-align: center">Цена</th>
            <th style="text-align: center">Сумма</th>
            <?php if ($materials->lossesValidate()): ?>
                <th style="text-align: center">% потерь</th>
                <th style="text-align: center">Сумма с потерями</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($materials->get() as $material): ?>
            <tr>
                <td><?= $material['title'] ?></td>
                <td style="text-align: right"><?= $material['unit'] ?></td>
                <td style="text-align: right"><?= round($material['quantity'], 4) ?></td>
                <td style="text-align: right"><?= round($material['price'], 2) ?></td>
                <td style="text-align: right"><?= round($material['summ'], 2) ?></td>
                <?php if ($materials->lossesValidate()): ?>
                    <td style="text-align: right"><?= $material['loss'] ?></td>
                    <td style="text-align: right"><?= round(app\modules\classes\MyFunctions::plusPercent($material['summ'], $material['loss']), 2) ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (материалы)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($materials->summWithoutLosses(), 2) ?></th>
            <?php if ($materials->lossesValidate()): ?>
                <th style="text-align: right"></th>
                <th style="text-align: right"><?= round($materials->summ(), 2) ?></th>
            <?php endif; ?>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>

    <?php if (!empty($calculation->calculation_materials_additional_data)): ?>
        <?php $materials = unserialize($calculation->calculation_materials_additional_data) ?>            
        <tr>
            <th>Вспомогательные материалы</th>
            <th style="text-align: center">Ед.изм.</th>
            <th style="text-align: center">Количество</th>
            <th style="text-align: center">Цена</th>
            <th style="text-align: center">Сумма</th>
            <?php if ($materials->lossesValidate()): ?>
                <th style="text-align: center">% потерь</th>
                <th style="text-align: center">Сумма с потерями</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($materials->get() as $material): ?>
            <tr>
                <td><?= $material['title'] ?></td>
                <td style="text-align: right"><?= $material['unit'] ?></td>
                <td style="text-align: right"><?= round($material['quantity'], 4) ?></td>
                <td style="text-align: right"><?= round($material['price'], 4) ?></td>
                <td style="text-align: right"><?= round($material['summ'], 2) ?></td>
                <?php if ($materials->lossesValidate()): ?>
                    <td style="text-align: right"><?= $material['loss'] ?></td>
                    <td style="text-align: right"><?= round(app\modules\classes\MyFunctions::plusPercent($material['summ'], $material['loss']), 2) ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (вспомогательные материалы)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($materials->summWithoutLosses(), 2) ?></th>
            <?php if ($materials->lossesValidate()): ?>
                <th style="text-align: right"></th>
                <th style="text-align: right"><?= round($materials->summ(), 2) ?></th>
            <?php endif; ?>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>

    <?php if (!empty($calculation->calculation_materials_data)): ?>            
        <tr>
            <th>Упаковка</th>
            <td style="text-align: center"></td>
            <th style="text-align: center">Количество</th>
            <th style="text-align: center">Цена</th>
            <th style="text-align: center">Сумма</th>
        </tr>
        <?php $packs = unserialize($calculation->calculation_packs_data) ?>
        <?php foreach ($packs->get() as $pack): ?>
            <tr>
                <td><?= $pack['title'] ?></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"><?= round((1 / $pack['capacity']), 4) ?></td>
                <td style="text-align: right"><?= round($pack['price'], 2) ?></td>
                <td style="text-align: right"><?= round($pack['value'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (упаковка)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($packs->summ(), 2) ?></th>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>
    <?php if (!empty($calculation->calculation_materials_data)): ?>            
        <tr>
            <th>Зарплата</th>
            <th></th>
            <th style="text-align: center">Кол-во сотрудников</th>
            <th style="text-align: center">Зарплата, грн/час</th>
            <th style="text-align: center">Сумма</th>
        </tr>
        <?php $positions = unserialize($calculation->calculation_positions_data) ?>
        <?php foreach ($positions->get() as $position): ?>
            <tr>
                <td><?= $position['title'] ?></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"><?= $position['quantity'] ?></td>
                <td style="text-align: right"><?= $position['value_per_hour'] ?></td>
                <td style="text-align: right"><?= round($position['summ'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (зарплата)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($positions->summ(), 2) ?></th>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>
    <?php if (!empty($calculation->calculation_expenses_data)): ?>            
        <tr>
            <th>Прочие затраты</th>
            <th></th>
            <td></td>
            <th style="text-align: center">Расход, грн/час</th>
            <th style="text-align: center">Грн/ед.продукции</th>
        </tr>
        <?php $expenses = unserialize($calculation->calculation_expenses_data) ?>
        <?php foreach ($expenses->get() as $expense): ?>
            <tr>
                <td><?= $expense['title'] ?></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"><?= $expense['value_per_hour'] ?></td>
                <td style="text-align: right"><?= round($expense['summ'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (прочие затраты)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($expenses->summ(), 2) ?></th>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>
    <?php if (!empty($calculation->calculation_losses_data)): ?>            
        <tr>
            <th>Плановые потери</th>
            <th></th>
            <td></td>
            <th style="text-align: center">%</th>
            <th style="text-align: center">Сумма</th>
        </tr>
        <?php $losses = unserialize($calculation->calculation_losses_data) ?>
        <?php foreach ($losses->get() as $loss): ?>
            <tr>
                <td><?= $loss['title'] ?></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"></td>
                <td style="text-align: right"><?= $loss['%'] ?></td>
                <td style="text-align: right"><?= round($loss['summ'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Итого (плановые потери)</th><td></td><td></td><td></td>
            <th style="text-align: right"><?= round($losses->summ(), 2) ?></th>
        </tr>
        <tr><td></td><td></td><td></td><td></td><td></td></tr>
    <?php endif; ?>
    <tr>
        <th><h3>Итого себестоимость:</h3></th>
        <td></td>
        <td></td>
        <td></td>
        <th style="text-align: right"><h3><?= round(($losses->getSumm() + $losses->summ()), 2) ?></h3></th>
    </tr>
</table>