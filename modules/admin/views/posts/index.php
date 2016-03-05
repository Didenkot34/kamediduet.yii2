<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/"><?= Yii::$app->params['siteName'] ?></a></li>
            <li><i class="icon_table"></i>Tables</li>
            <li><i class="fa fa-user-md"></i><?= $this->title?></li>
        </ol>
    </div>
</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php //$searchModel = new \app\modules\admin\models\PostsSearch() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id_posts',
            'id_categories',
            'title',
            'discription',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img(Url::toRoute('@web/images/event/category' . $data->id_categories . '/post' . $data->id_posts.'/background.jpg'), [
                        'alt' => $data->title,
                        'title' => $data->title,
                        'class' => 'img-thumbnail',
                        'style' => 'width:60px;',
                        'data-toggle' => 'modal',
                        'data-target' => '#id' . $data->id_posts
                    ]);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'template' => '{view} {update} {delete} {link}',
                'buttons' => [
                    'view' => function ($url, $data) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                                'data-toggle' => 'modal',
                                'data-target' => '#id' . $data->id_posts
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

<!-- Modal -->
<?php foreach ($model->find()->all() as $post): ?>
    <div id="id<?= $post->id_posts ?>" class="modal fade" role="dialog">
        <div class="modal-dialog" style="left:5%">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><?= $model->getNameCategory($post->id_categories)  ?></h4>
                </div>
                <div class="modal-body">
                    <p class=" text-center"><?= $post->title ?></p>
                    <?=
                    Html::img(Url::toRoute('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts.'/background.jpg'), [
                        'alt' => $post->title,
                        'title' => $post->title,
                        'class' => 'img-thumbnail',
                        'style' => 'width:100%'
                    ])
                    ?>
                    <div class="pop-up-box">
                        <div class="popup-content">
                            <?= $post->discription ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php endforeach ?>

