<?php

namespace app\modules\event\controllers;

use Yii;
use app\models\Categories;
use app\models\Posts;
use app\models\Comments;
use app\models\SaveComment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoriesController extends Controller
{
    public $layout = 'event';

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
        if (!($category = Categories::findOne(['id_categories' => $id]))) { // item does not exist
            throw new NotFoundHttpException('Категория с идентфикатором "' . $id . '" отсутствует');
        } else {
            $posts = Posts::getAllPosts($id);
            return $this->render('posts', [
                'posts' => $posts,
                'category' => $category,
            ]);
        }
    }

    public function actionSinglePost($id)
    {
        $this->layout = 'index';

        if (!($post = Posts::findOne(['id_posts' => $id]))) { // item does not exist
            throw new NotFoundHttpException('Пост с идентфикатором "' . $id . '" отсутствует');
        } else {
            $img = explode(',', $post->numbers_img);
            if (!$img[0]) {
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
            /**
             * return Model SaveComment
             */
            $comment = new SaveComment();

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
    }
}
