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
class AppAssetYii extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'assetPiccolo/css/bootstrap-responsive.css',
//        'assetPiccolo/css/flexslider.css',
        'css/site.css',
        'css/animate.css',
    ];
    public $js = [
        'assetPiccolo/js/jquery-latest.js',
        'assetPiccolo/js/jquery.flexslider.js',
        'assetPiccolo/js/my.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
