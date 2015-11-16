<?php

namespace app\modules\event\controllers;

use Yii;
use app\models\Categories;
use app\models\Posts;
use app\models\Comments;
use app\models\SaveComment;
use yii\helpers\Url;
use yii\web\Controller;

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

    public function actionSaveComment()
    {
        $comment = new SaveComment();
        if (Yii::$app->request->isAjax) {
            if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {
                if ($comment->saveComment()) {
                    return json_encode(['name' => $comment->users_name]);
                } else {
                    return json_encode(['name' => false]);
                }
            }
        } else {
            if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {
                if ($comment->saveComment()) {
                    Yii::$app->session->setFlash('savedComment', '<strong>' . $comment->users_name . '</strong>, Ваш Комментарий успешно отправлен! Спасибо за отзыв!');
                    return Yii::$app->response->redirect(Url::to(['/event/categories/single-post', 'id' => $comment->id_posts]));
                } else {
                    Yii::$app->session->setFlash('savedComment', '<strong>' . $comment->users_name . '</strong>,К сожалению, Ваш комментарий не был сохранен.
                     Приносим свои извенения! Попробуйте немного позже.');
                    return Yii::$app->response->redirect(Url::to(['/event/categories/single-post', 'id' => $comment->id_posts]));
                }
            }
        }
    }

}
