<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\product\models\admin\CategoryProduct;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                $menuItems[] = CategoryProduct::getCategoryToMenu();
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            $xmlEur = simplexml_load_string(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR'));
            $jsonEur = json_encode($xmlEur);
            $eur = json_decode($jsonEur, TRUE);
            $xmlUsd = simplexml_load_string(file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD'));
            $jsonUsd = json_encode($xmlUsd);
            $usd = json_decode($jsonUsd, TRUE);
            NavBar::begin([
                'brandLabel' => 'Documentator' . '<font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EUR: ' . $eur['currency']['rate'] . ', USD: ' . $usd['currency']['rate'] . ' Дата: ' . $eur['currency']['exchangedate'] . '</font>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top', //navbar-fixed-top
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 top-margin">
                        <?php
                        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->status > 30) {
                            echo $this->render('@app/views/partials/side_menu');
                        }
                        ?>
                    </div>
                    <div class="col-lg-10 top-margin">
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
                        <?= $content ?>
                    </div>
                </div>
            </div>

        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="pull-left">&copy; STC Ltd <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
