<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'home' => [
            'class' => 'app\modules\home\Module',
        ],
        'event' => [
            'class' => 'app\modules\event\Module',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'tooltip' => [
            'class' => 'app\modules\tooltip\Module',
        ],
        'posts' => [
            'class' => 'app\modules\posts\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wSVD7sw4UMnK-rbkqYszfe9S5FtK-FtY',
        ],
        'urlManager'=>[
            'class' =>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => FALSE,
            //'enableStrictParsing' => true,
            'rules' => [
                '/' => 'home/index/index',
//                'login' => 'site/login',
                'categories/<id:\d+>' => 'event/categories/posts',
//                'single-post/<id:\d+>' => 'event/categories/single-post',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

