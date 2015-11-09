<?php

namespace app\modules\event\controllers;

use Yii;
use yii\web\View;
use app\models\Categories;
use app\models\Posts;
use app\models\Comments;
use app\models\SaveComment;
use yii\web\Controller;
use yii\bootstrap\Alert;

class CategoriesController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEvents()
    {
        $categories = Categories::find()
            ->orderBy('id_categories')
            ->all();

        return $this->render('events', [
            'categories' => $categories,
        ]);
    }

    public function actionPosts($id)
    {
        $category = Categories::findOne(['id_categories' => $id]);

        $posts = Posts::getAllPosts($id);

        return $this->render('posts', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }

    public function actionSinglePost($id)
    {
        $this->layout = 'index';

        $post = Posts::findOne(['id_posts' => $id]);
        if (!$post) {
            return $this->render('error', [
                'id' => $id,
            ]);
        }
        $img = explode(',', $post->numbers_img);
        if ($img[0] == 0) {
            $img[0] = 'background';
            $img[1] = 'background';
        }

        $posts = Posts::exceptCurrentPost($post->id_categories, $id);

        $category = Categories::findOne(['id_categories' => $post->id_categories]);

        $categories = Categories::find()->all();

        /**
         * return count posts in current Category
         */
        foreach ($categories as $category_one) {
            $count[$category_one->id_categories] = Posts::find()
                ->where(['id_categories' => $category_one->id_categories])
                ->count();
        }
        /**
         * return all comments current post
         */
        $saved_comments = Comments::find()
            ->where(['id_posts' => $id])
            ->all();

        $comment = new SaveComment();
        if ($comment->load(Yii::$app->request->post())) {
            if ($comment->saveComment()) {
                if (!Yii::$app->request->isPjax) {
                    $this->redirect('single-post?id=' . $comment->id_posts);
                }
            }
            return
                ' <div class="col-sm-6 col-sm-offset-3">'
                . Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'body' => $comment->users_name . ', Ваш Комментарий успешно отправлен! Спасибо за отзыв!',
                ]) .
                '</div>';
        }


        return $this->render('single-post', [
            'post' => $post,
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
            'comment' => $comment,
            'saved_comments' => $saved_comments,
            'count' => $count,
            'img' => $img
        ]);

    }

    public function actionSaveComment()
    {
        $comment = new SaveComment();
        if ($comment->load(Yii::$app->request->post())) {
            if ($comment->saveComment()) {
                if (!Yii::$app->request->isPjax) {
                    $this->redirect('single-post?id=' . $comment->id_posts);
                }
            }
            return 'Все прошло хорошо';
        }
    }

    public function actionComment()
    {
        $comment = new SaveComment();

        if ($comment->load(Yii::$app->request->post())) {
            $comment->saveComment();

            return $this->render('save-comment', ['comment' => $comment]);
        } else {
            return $this->render('comment', ['comment' => $comment]);
        }
    }

}
