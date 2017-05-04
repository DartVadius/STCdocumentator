<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $calculation->calculation_product_title;
?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <p>
            <?= Html::a('Удалить', ['delete', 'id' => $calculation->calculation_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Редактировать', ['update', 'id' => $calculation->calculation_id], ['class' => 'btn btn-primary']) ?>
        </p>
        <h1>Калькуляция <?= $calculation->calculation_product_title ?></h1>
        <h6>Дата: <?= $calculation->calculation_date ?></h6>

        <?=
        DetailView::widget([
            'model' => $calculation,
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
        <table class="table table-bordered table-responsive table-striped table-condensed">
            <tr>
                <th></th>
                <th style="text-align: center">Количество</th>
                <th style="text-align: center">Ед.изм.</th>
                <th style="text-align: center">Цена</th>
                <th style="text-align: center">Сумма</th>
            </tr>
<?php if (!empty($calculation->calculation_recipe_data)): ?>            
                <tr>
                    <th>Материалы (рецептура)</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    <?php $recipeMaterials = unserialize($calculation->calculation_recipe_data) ?>
    <?php foreach ($recipeMaterials->get() as $material): ?>
                    <tr>
                        <td><?= $material['title'] ?></td>
                        <td style="text-align: right"><?= $material['quantity'] ?></td>
                        <td style="text-align: right"><?= $material['unit'] ?></td>
                        <td style="text-align: right"><?= $material['price'] ?></td>
                        <td style="text-align: right"><?= round($material['summ'], 2) ?></td>
                    </tr>
    <?php endforeach; ?>            
                <tr>
                    <th>Итого (материалы рецептуры)</th><td></td><td></td><td></td>
                    <th style="text-align: right"><?= round($recipeMaterials->summ(), 2) ?></th>
                </tr>
                <tr><td></td><td></td><td></td><td></td><td></td></tr>
<?php endif; ?>
<?php if (!empty($calculation->calculation_materials_data)): ?>            
                <tr>
                    <th>Материалы</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
    <?php $materials = unserialize($calculation->calculation_materials_data) ?>
    <?php foreach ($materials->get() as $material): ?>
                    <tr>
                        <td><?= $material['title'] ?></td>
                        <td style="text-align: right"><?= $material['quantity'] ?></td>
                        <td style="text-align: right"><?= $material['unit'] ?></td>
                        <td style="text-align: right"><?= $material['price'] ?></td>
                        <td style="text-align: right"><?= round($material['summ'], 2) ?></td>
                    </tr>
    <?php endforeach; ?>
                <tr>
                    <th>Итого (материалы)</th><td></td><td></td><td></td>
                    <th style="text-align: right"><?= round($materials->summ(), 2) ?></th>
                </tr>
                <tr><td></td><td></td><td></td><td></td><td></td></tr>
<?php endif; ?>
<?php if (!empty($calculation->calculation_materials_data)): ?>            
                <tr>
                    <th>Упаковка</th>
                    <th style="text-align: center">Емкость упаковки</th>
                    <td></td>
                    <th style="text-align: center">Цена</th>
                    <th style="text-align: center">Сумма</th>
                </tr>
    <?php $packs = unserialize($calculation->calculation_packs_data) ?>
    <?php foreach ($packs->get() as $pack): ?>
                    <tr>
                        <td><?= $pack['title'] ?></td>
                        <td style="text-align: right"><?= $pack['capacity'] ?></td>
                        <td style="text-align: right"></td>
                        <td style="text-align: right"><?= $pack['price'] ?></td>
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
                    <th style="text-align: center">Кол-во сотрудников</th>
                    <td></td>
                    <th style="text-align: center">Зарплата в час</th>
                    <th style="text-align: center">Сумма</th>
                </tr>
    <?php $positions = unserialize($calculation->calculation_positions_data) ?>
    <?php foreach ($positions->get() as $position): ?>
                    <tr>
                        <td><?= $position['title'] ?></td>
                        <td style="text-align: right"><?= $position['quantity'] ?></td>
                        <td style="text-align: right"></td>
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
                    <th style="text-align: center">Стоимость в час</th>
                    <th style="text-align: center">Сумма</th>
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
                    <th>Итого (зарплата)</th><td></td><td></td><td></td>
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
    </div>
    <div class="col-lg-2"></div>
</div>
