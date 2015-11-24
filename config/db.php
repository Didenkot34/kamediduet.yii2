<?php
use yii\web\Request;

$reguest = new Request();

if ($reguest->userIP == '127.0.0.1') {

    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=kamediduetcom_yii',
        'username' => 'root',
        'password' => '1234',
        'charset' => 'utf8',
    ];
} else {

    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=u369027448_show',
        'username' => 'u369027448_root',
        'password' => 'heLR25KIg5RExm2zH4',
        'charset' => 'utf8',
    ];
}