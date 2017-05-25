<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;

$this->registerCssFile('@web/css/left_menu.css');
$adminMenuItems = [];
if (Yii::$app->user->identity->status > 30) {

    $adminMenuItems[] = [
        'label' => 'Управление номенклатурой',
        'items' => [
            ['label' => 'Продукция', 'url' => ['/product/admin/product/index']],
            ['label' => 'Рецептуры', 'url' => ['/product/admin/recipe/index']],
            ['label' => 'Калькуляции', 'url' => ['/calculation/calculation/index']],
        ]
    ];
    $adminMenuItems[] = [
        'label' => 'Базовые справочники',
        'items' => [
            ['label' => 'Ед.изм', 'url' => ['/product/admin/unit/index']],
            ['label' => 'Валюта', 'url' => ['/product/admin/currency/index']],
            ['label' => 'Категории материалов', 'url' => ['/product/admin/category/index']],
            ['label' => 'Категории продуктов', 'url' => ['/product/admin/category-product/index']],
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
        'label' => 'Характеристики продукции',
        'items' => [
            ['label' => 'Свойства и параметры', 'url' => ['/product/admin/parameter/index']],
            ['label' => 'Решения', 'url' => ['/product/admin/solution/index']],
        ],
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


<?php

//if (!Yii::$app->user->isGuest && Yii::$app->user->identity->status > 30) {
    echo Nav::widget([
        'options' => [
            'class' => 'nav nav-pills nav-stacked'
        ],
        'items' => $adminMenuItems,
    ]);
//}
?>
<?php // $this->registerJsFile('@web/js/left_menu.js'); ?>