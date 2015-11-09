<?php

namespace app\modules\posts\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'posts';
    public function actionIndex()
    {
        return $this->render('index');
    }
}
