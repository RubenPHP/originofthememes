<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use common\models\User;

/* @var $this \yii\web\View */
/* @var $content string */

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
            NavBar::begin([
                'brandLabel' => 'Origin of the Memes',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [];
            if (!Yii::$app->user->isGuest&&User::isUserAdmin(Yii::$app->user->identity->username))
            {
                $menuItems = [
                    ['label' => 'Vidmage', 'items' =>[
                        ['label' => 'Vidmage List','url' => ['/vidmage/index']],
                        ['label' => 'Vidmage New','url' => ['/vidmage/create']],
                        ['label' => 'Category','url' => ['/category/index']],
                        ['label' => 'Author','url' => ['/author/index']],
                        ['label' => 'Tag','url' => ['/tag/index']],
                                        ]],
                    ['label' => 'Meme', 'url' => ['/meme/index']],
                    ['label' => 'Platform', 'url' => ['/platform/index']],
                    //['label' => 'User', 'url' => ['/user/index']],
                ];
            }
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            $menuItems[] = [
                'label' => 'Frontend',
                'url' => Yii::getAlias('@frontendUrl')
            ];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
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
