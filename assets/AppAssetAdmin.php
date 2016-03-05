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
class AppAssetAdmin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assetAdmin/css/bootstrap-theme.css',
        'assetAdmin/css/elegant-icons-style.css',
        'assetAdmin/css/style.css',
        'assetAdmin/css/style-responsive.css',
    ];
    public $js = [
        'assetAdmin/js/bootstrap.min.js',
        'assetAdmin/js/jquery.scrollTo.min.js',
        'assetAdmin/js/jquery.nicescroll.js',

//        'assetAdmin/js/jquery-ui-1.9.2.custom.min.js',
//        'assetAdmin/js/ga.js',
//        'assetAdmin/js/bootstrap-switch.js',
//        'assetAdmin/js/jquery.tagsinput.js',

        'assetAdmin/assets/jquery-knob/js/jquery.knob.js',
        'assetAdmin/js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
