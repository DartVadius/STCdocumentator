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
            if (!Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Главная', 'url' => ['/product/index/index']];
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
                <div class="row">
                    <div class="col-lg-3 blog-sidebar">
                        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->status > 30): ?>
                            <p class="btn btn-block btn-primary">Админпанель</p>
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-9">
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            echo Breadcrumbs::widget([
                                'homeLink' => [
                                    'label' => Yii::t('yii', 'Главная'),
                                    'url' => '/product/index/index',
                                ],
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]);
                        }
                        ?>

                    </div>
                </div>

                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; STC Ltd <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>