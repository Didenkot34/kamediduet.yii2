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
class AppAssetEvent extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assetEvent/fonts/feather/style.css',
        'assetEvent/css/demo.css',
        'assetEvent/css/component.css',
    ];
    public $js = [
        'assetEvent/js/modernizr.custom.js',
        'assetEvent/js/classie.js',
        'assetEvent/js/dynamics.min.js',
        'assetEvent/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
