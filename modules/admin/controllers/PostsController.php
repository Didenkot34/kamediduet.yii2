<?php

namespace app\modules\admin\controllers;

use app\models\Categories;
use Yii;
use app\modules\admin\models\Posts;
use app\modules\admin\models\Comments;
use app\modules\admin\models\Orders;
use app\modules\admin\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    public $layout = 'adminpanel';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can($action->id)) {
                return Yii::$app->response->redirect(Url::to(['/admin/default/login']));
            }

            $this->view->params['count']['countNewComments'] = Comments::getCountNewComments();
            $this->view->params['count']['countNewOrders'] = Orders::getCountNewOrders();
            $this->view->params['comments']['model'] = Comments::getAllComments(0);
            $this->view->params['orders']['model'] = Orders::getNewOrders();

            return true;
        } else {
            return false;
        }
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $cache = Yii::$app->cache;
        $model = new Posts();
        $uploadModel = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $path = 'images/event/category' . $model->id_categories . '/post' . $model->id_posts;

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($path,$model);

            $cache->set('posts', false);

            return $this->redirect(['view', 'id' => $model->id_posts]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'uploadModel' => $uploadModel
            ]);
        }
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $cache = Yii::$app->cache;
        $model = $this->findModel($id);
        $path = 'images/event/category' . $model->id_categories . '/post' . $model->id_posts;
        $uploadModel = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($path,$model);

            $cache->set('posts', false);

            return $this->redirect(['view', 'id' => $model->id_posts]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'uploadModel' => $uploadModel
            ]);
        }
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $cache = Yii::$app->cache;
        $this->findModel($id)->delete();

        $cache->set('posts', false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
