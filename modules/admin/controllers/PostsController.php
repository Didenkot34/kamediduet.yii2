<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Posts;
use app\models\Comments;
use app\models\Orders;
use app\models\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\Traits\Path;


/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    use Path;
    public $property = 'posts_img';
    public $deleteImg = [];
    public $layout = 'adminpanel';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can($action->id)) {
                return Yii::$app->response->redirect(Url::to(['/admin/default/login']));
            }

            $this->view->params['count']['countNewComments'] = Comments::getCountNewComments();
            $this->view->params['count']['countNewOrders'] = Orders::getCountNewOrders();
            $this->view->params['comments']['model'] = Comments::getComments(NEW_COMMENTS);
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
            'dataProvider' => $dataProvider,
            'model' => new Posts()
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

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($this->getPostPath($model->id_categories, $model->id_posts), $model, $this->property);

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
        $posts = new Posts();

        if (isset($_POST['Posts']['checkbox']) && !empty($_POST['Posts']['checkbox'])) {
            $this->deleteImg = $_POST['Posts']['checkbox'];
            $posts->deletePhotos($id,$this->deleteImg);
        }

        $cache = Yii::$app->cache;
        $model = $this->findModel($id);
        $path = $this->getPostPath($model->id_categories, $model->id_posts);
        $uploadModel = new UploadForm();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($path, $model, $this->property);
            $cache->set('posts', false);

            return $this->redirect(['view', 'id' => $model->id_posts]);
        } else {

            return $this->render('update', [
                'model' => $model,
                'uploadModel' => $uploadModel,
                'arrayAllImg' => $posts->getArrayAllImg($id)
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
        $model = $this->findModel($id);
        $this->removeDirectory($this->getPostPath($model->id_categories, $model->id_posts));
        $model->delete();
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
