<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'yii';
    public function actionIndex()
    {
        return $this->render('index');
    }
}
