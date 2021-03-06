<?php

use yii\bootstrap\Nav;

$this->registerCssFile('@web/css/left_menu.css');
$adminMenuItems = [];
if (Yii::$app->user->identity->status > 30) {
    $adminMenuItems[] = [
        'label' => 'Номенклатура',
        'items' => [
            ['label' => 'Продукция', 'url' => ['/product/admin/product/index'],],
            ['label' => 'Рецептуры', 'url' => ['/product/admin/recipe/index']],
            ['label' => 'Аналитика', 'url' => ['/calculation/calculation/menu']],
        ]
    ];
    $adminMenuItems[] = [
        'label' => 'Материалы и затраты',
        'items' => [
            ['label' => 'Материалы', 'url' => ['/product/admin/material/index']],
            ['label' => 'Упаковка', 'url' => ['/product/admin/pack/index']],
            ['label' => 'Прочие затраты', 'url' => ['/product/admin/other-expenses/index']],
            ['label' => 'Должности', 'url' => ['/product/admin/position/index']],
            ['label' => 'Плановые потери', 'url' => ['/product/admin/loss/index']],
        ],
    ];
    $adminMenuItems[] = [
        'label' => 'Характеристики',
        'items' => [
            ['label' => 'Свойства и параметры', 'url' => ['/product/admin/parameter/index']],
            ['label' => 'Решения', 'url' => ['/product/admin/solution/index']],
        ],
    ];
    $adminMenuItems[] = [
        'label' => 'Базовые справочники',
        'items' => [
            ['label' => 'Ед.изм', 'url' => ['/product/admin/unit/index']],
            ['label' => 'Валюта', 'url' => ['/product/admin/currency/index']],
            ['label' => 'Категории материалов', 'url' => ['/product/admin/category/index']],
            ['label' => 'Категории продуктов', 'url' => ['/product/admin/category-product/index']],
            ['label' => 'Категории упаковки', 'url' => ['/product/admin/category-pack/index']],
            ['label' => 'Настройки приложения', 'url' => ['/directory/index/config']],
        ]
    ];
}
if (Yii::$app->user->identity->status == 100) {
    $adminMenuItems[] = [
        'label' => 'Управление доступом',
        'items' => [
            ['label' => 'Пользователи', 'url' => ['/rbac/user']],
            ['label' => 'Назначения', 'url' => ['/rbac/assignment']],
            ['label' => 'Маршруты', 'url' => ['/rbac/route']],
            ['label' => 'Роли', 'url' => ['/rbac/role']],
        ],
    ];
}
?>
<div id="my-left-menu">
        <p class="list-group-item active">Админпанель</p>
        <?php
        echo Nav::widget([
            'options' => [
                'class' => 'nav nav-pills nav-stacked',
                'id' => 'menu_left_custom'
            ],
            'items' => $adminMenuItems,
        ]);
        ?>
</div>