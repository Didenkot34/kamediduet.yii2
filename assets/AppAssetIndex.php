<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetIndex extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assetIndex/font-awesome-4.4.0/css/font-awesome.min.css',
        'assetIndex/css_index/simple-line-icons.css',
        'assetIndex/css_index/flexslider.css',
        'assetIndex/css_index/animate.css',
        'assetIndex/css_index/style.css',

    ];
    public $js = [
        'assetIndex/js_index/modernizr.custom.js',
        'assetIndex/js_index/bootstrap.min.js',
        'assetIndex/js_index/jquery.parallax-1.1.3.js',
        'assetIndex/js_index/imagesloaded.pkgd.js',
        'assetIndex/js_index/jquery.sticky.js',
        'assetIndex/js_index/smoothscroll.js',
        'assetIndex/js_index/wow.min.js',
        'assetIndex/js_index/jquery.easypiechart.js',
        'assetIndex/js_index/waypoints.min.js',
        'assetIndex/js_index/jquery.cbpQTRotator.js',
        'assetIndex/js_index/custom.js',
        'assetIndex/js_index/comment.js',
        'assetIndex/js_index/jquery.flexslider.js',
        'assetIndex/js_index/my.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
