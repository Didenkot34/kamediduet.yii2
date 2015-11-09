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
class AppAssetPiccolo extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'assetTooltip/css/normalize.css',
        'assetPiccolo/css/bootstrap.css',
        'assetPiccolo/css/bootstrap-responsive.css',
        'assetPiccolo/css/prettyPhoto.css',
        'assetPiccolo/css/flexslider.css',
        'assetPiccolo/css/custom-styles.css',

//        'assetPiccolo/css/style-ie.css',
    ];
    public $js = [
        'assetPiccolo/js/jquery-latest.js',
        'assetPiccolo/js/bootstrap.js',
        'assetPiccolo/js/jquery.prettyPhoto.js',
        'assetPiccolo/js/jquery.flexslider.js',
        'assetPiccolo/js/my.js',
        'assetPiccolo/js/jquery.custom.js',

    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
