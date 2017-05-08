<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/rbac/user/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/rbac/user/login']];
            } else {
                $menuItems[] = ['label' => 'Главная', 'url' => ['/product/index']];
                $menuItems[] =  [
                    'label' => 'Управление номенклатурой',
                        'items' => [
                            ['label' => 'Продукция', 'url' => ['/product/admin/product/index']],
                            ['label' => 'Рецептуры', 'url' => ['/product/admin/recipe/index']],
                            ['label' => 'Калькуляции', 'url' => ['/calculation/calculation/index']],
                        ]
                ];
                $menuItems[] = [
                        'label' => 'Справочники',
                        'items' => [
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Базовые справочники</li>',
                            '<li class="divider"></li>',
                            ['label' => 'Ед.изм', 'url' => ['/product/admin/unit/index']],
                            ['label' => 'Валюта', 'url' => ['/product/admin/currency/index']],
                            ['label' => 'Категории материалов', 'url' => ['/product/admin/category/index']],
                            ['label' => 'Категории продуктов', 'url' => ['/product/admin/category-product/index']],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Расходные материалы и затраты</li>',
                            '<li class="divider"></li>',
                            ['label' => 'Материалы', 'url' => ['/product/admin/material/index']],
                            ['label' => 'Упаковка', 'url' => ['/product/admin/pack/index']],
                            ['label' => 'Прочие затраты', 'url' => ['/product/admin/other-expenses/index']],
                            ['label' => 'Должности', 'url' => ['/product/admin/position/index']],
                            ['label' => 'Плановые потери', 'url' => ['/product/admin/loss/index']],
                            '<li class="divider"></li>',
                            '<li class="dropdown-header">Продукция</li>',
                            '<li class="divider"></li>',
                            ['label' => 'Свойства и параметры', 'url' => ['/product/admin/parameter/index']],
                            ['label' => 'Решения', 'url' => ['/product/admin/solution/index']],
                        ],
                    ];
                $menuItems[] = [
                        'label' => 'Управление доступом',
                        'items' => [
                            ['label' => 'Пользователи', 'url' => ['/rbac/user']],
                            ['label' => 'Назначения', 'url' => ['/rbac/assignment']],
                            ['label' => 'Маршруты', 'url' => ['/rbac/route']],
                            ['label' => 'Роли', 'url' => ['/rbac/role']],
                        ],
                    ];
                $menuItems[] = '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>';
            }
            NavBar::begin([
                'brandLabel' => 'Documentator',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
