<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\MobiriseAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

$facebookUrl = Yii::$app->params['facebookUrl'];

MobiriseAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<body>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">

                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="http://originofthememes.com">ORIGIN of the MEMES</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="http://originofthememes.com">HOME</a></li> </ul></div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $content ?>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="social-buttons1-20" style="background-color: rgb(255, 255, 255);">


    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">SHARE THIS PAGE!</h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="true">
                    <div class="mbr-social-icons__icon social-likes__icon facebook socicon-bg-facebook" title="Share link on Facebook">
                        <i class="socicon socicon-facebook"></i>

                    </div>
                    <div class="mbr-social-icons__icon social-likes__icon plusone socicon-bg-googleplus" title="Share link on Google+">
                        <i class="socicon socicon-googleplus"></i>

                    </div>
                    <div class="mbr-social-icons__icon social-likes__icon twitter socicon-bg-twitter" title="Share link on Twitter">
                        <i class="socicon socicon-twitter"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->render('_footer') ?>

<footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-18" style="background-color: rgb(68, 68, 68);">

    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row">
            <div class="col-sm-12">
                <p class="pull-left mbr-footer__copyright">&copy; Origin of the Memes <?= date('Y') ?></p>
                <p class="pull-right mbr-footer__copyright">Developed by <a href="http://rubendjon.com/" rel="nofollow" target="_blank">RubenDjOn</a></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    var clicky_site_ids = clicky_site_ids || [];
    clicky_site_ids.push(100866915);
    (function() {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//static.getclicky.com/js';
        ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
    })();
</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100866915ns.gif" /></p></noscript>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
