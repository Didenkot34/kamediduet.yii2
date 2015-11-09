<?php

namespace app\modules\home\controllers;

use yii\web\Controller;
use app\models\Posts;

class IndexController extends Controller
{
    public $layout = 'index';

    public function actionIndex()
    {
        $posts = Posts::find()
            ->orderBy('id_posts')
            ->limit(3)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
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
}
