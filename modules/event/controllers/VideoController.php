<?php
/**
 * Created by PhpStorm.
 * User: didenkot34
 * Date: 21.11.15
 * Time: 6:58
 */
namespace app\modules\event\controllers;

use Yii;
use yii\web\Controller;

class VideoController extends Controller
{
    public $layout = 'video';

    public function actionIndex()
    {
        return $this->render('index');
    }
}