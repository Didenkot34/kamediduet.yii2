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
use app\models\Comments;
use yii\helpers\Url;
use app\models\SaveComment;

class CommentsController extends Controller
{
    public $layout = 'all-comments';

    public function actionAllComments()
    {
        $comments = Comments::getAllComments();

        return $this->render('all-comments',[
            'comments' => $comments,
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