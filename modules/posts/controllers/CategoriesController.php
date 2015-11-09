<?php

namespace app\modules\posts\controllers;

use Yii;
use app\modules\posts\models\Categories;
use app\modules\posts\models\Posts;
use app\modules\posts\models\Comments;
use app\models\SaveComment;
use yii\web\Controller;

class CategoriesController extends Controller
{
    public $layout = 'posts';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPosts($id)
    {
        $category = Categories::find()
            ->where(['id_categories' => $id])
            ->one();
        $posts = Posts::find()
            ->where(['id_categories' => $id])
            ->orderBy('id_posts')
            ->all();
        return $this->render('posts', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }

    public function actionSinglePost($id)
    {
        $post = Posts::find()
            ->where(['id_posts' => $id])
            ->one();
        if (!$post) {
            return $this->render('error', [
                'id' => $id,
            ]);
        }

        $category = Categories::find()
            ->where(['id_categories' => $post->id_categories])
            ->one();
        $posts = Posts::find()
            ->where(['id_categories' => $post->id_categories])
            ->andWhere(['!=', 'id_posts', $id])
            ->orderBy('id_posts')
            ->all();
        $categories = Categories::find()
            ->all();
        $saved_comments = Comments::find()
            ->where(['id_posts' => $id])
            ->all();
        $comment = new SaveComment();

        foreach($categories as $category_one){
            $count[$category_one->id_categories] = Posts::find()
                ->where(['id_categories' => $category_one->id_categories])
                ->count();
        }

        return $this->render('single-post', [
            'post' => $post,
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
            'comment' => $comment,
            'saved_comments' => $saved_comments,
            'count' => $count,
        ]);

    }

    public function actionSaveComment()
    {
        $comment = new SaveComment();
        if ($comment->load(Yii::$app->request->post())) {
            if ($comment->saveComment()) {
                $this->redirect('single-post?id=' . $comment->id_posts);
//               return $this->render('single-post', [
//            'comment' => $comment,
//            'saved_comments' => $saved_comments,
//             ]);
            }
        }
    }
}
