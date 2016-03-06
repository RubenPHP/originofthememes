<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MobiriseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/mobirise';
    public $css = [
        'bootstrap/css/bootstrap.min.css',
        'socicon/css/socicon.min.css',
        'mobirise/css/style.css',
        'mobirise-slider/style.css',
        'mobirise/css/mbr-additional.css',
    ];
    public $js = [
        'smooth-scroll/SmoothScroll.js',
        'bootstrap-carousel-swipe/bootstrap-carousel-swipe.js',
        'social-likes/social-likes.js',
        'mobirise/js/script.js',
    ];
    /*TODO: check why with the bootstrapAsset the page don't render OK*/
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
//'yii\bootstrap\BootstrapAsset',
    ];
}
