<?php

namespace app\modules\tooltip\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'home';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
