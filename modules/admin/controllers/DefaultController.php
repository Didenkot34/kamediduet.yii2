<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use yii\helpers\Url;

class DefaultController extends Controller
{
    public $layout = 'yii';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->response->redirect(Url::to(['/admin/posts/index']));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
