<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Categories;
use app\models\Comments;
use app\models\Orders;
use app\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\Traits\Path;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    use Path;
    public $property = 'categories_img';
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
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => new Categories()
        ]);
    }

    /**
     * Displays a single Categories model.
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
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();
        $uploadModel = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($this->getCategoryPath($model->id_categories), $model, $this->property);

            return $this->redirect(['view', 'id' => $model->id_categories]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'uploadModel' => $uploadModel
            ]);
        }
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $path = $this->getCategoryPath($model->id_categories);
        $uploadModel = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            $uploadModel->upload($path, $model, $this->property);

            return $this->redirect(['view', 'id' => $model->id_categories]);
        } else {

            return $this->render('update', [
                'model' => $model,
                'uploadModel' => $uploadModel
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->removeDirectory($this->getCategoryPath($model->id_categories));
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
