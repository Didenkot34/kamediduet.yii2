<?php

namespace app\modules\home\controllers;

use yii\web\Controller;
use app\models\Posts;
use app\models\SearchPost;
use app\models\Comments;
use app\models\SaveOrder;
use Yii;

class IndexController extends Controller
{
    public $layout = 'index';

    public function actions()
    {
        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $cache = Yii::$app->cache;
        $posts = $cache->get('posts');
        if ($posts === false) {
            $posts = Posts::find()
                ->orderBy('id_posts')
                ->limit(3)
                ->all();
            $cache->set('posts', $posts, 24*60*60);
        }

        $comments = $cache->get('comments');
        if ($comments === false) {
            $comments = Comments::getAllComments();
            $cache->set('comments', $comments, 24*60*60);
        }

        $posts_select = Posts::find()
            ->select('value', 'title')
            ->asArray()
            ->all();
        $select_model = new SearchPost();

        $model = new SaveOrder();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('index', [
            'posts' => $posts,
            'comments'=>$comments,
            'model' => $model,
            'posts_select' => $posts_select,
            'select_model' => $select_model
        ]);
    }
//    public function actionMkdirs(){
//        $posts_all = Posts::find()
//            ->where(['id_categories' => 6])
//            ->orderBy('id_posts')
//            ->all();
//
//        foreach($posts_all as $post):
//            if (!is_dir('images/event/category6/post' . $post->id_posts)) {
//                mkdir('images/event/category6/post' . $post->id_posts,0777, true);
//            }
//        endforeach;
//        return $this->render('mkdirs');
//    }

    public function actionSaveOrder()
    {
        $order = new SaveOrder();
        if (Yii::$app->request->isAjax) {
            if ($order->load(Yii::$app->request->post()) && $order->validate()) {
                if ($order->saveOrder() ) {
                    return json_encode(['name' => $order->name]);
                } else {
                    return json_encode(['name' => false]);
                }
            }
        }
    }

    public function actionSearchPost()
    {
        $search_post = new SearchPost();
        if (Yii::$app->request->isAjax) {
            if ($search_post->load(Yii::$app->request->post()) && $search_post->validate()) {
                $post = Posts::find()
                    ->where(['title' => $search_post->title])
                    ->one();
                if (isset($post)) {
                    return json_encode(['id' => $post->id_posts]);
                } else {
                    return json_encode(['id' => false]);
                }
            }
        }
    }

}
