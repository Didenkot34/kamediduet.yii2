<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
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
<div class="categories-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categories',
            'title',
            'discription',

            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img(Url::toRoute('@web/images/cat' . $data->id_categories . '/korporativ.jpeg'), [
                        'alt' => $data->title,
                        'title' => $data->title,
                        'class' => 'img-thumbnail',
                        'style' => 'width:60px;',
                        'data-toggle' => 'modal',
                        'data-target' => '#id' . $data->id_categories
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
                                'data-target' => '#id' . $data->id_categories
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
</div>
<?php foreach ($model->find()->all() as $category): ?>
    <div id="id<?= $category->id_categories ?>" class="modal fade" role="dialog">
        <div class="modal-dialog" style="left:5%">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><?= $category->id_categories ?></h4>
                </div>
                <div class="modal-body">
                    <p class=" text-center"><?= $category->title ?></p>
                    <?=
                    Html::img(Url::toRoute('@web/images/cat' . $category->id_categories . '/korporativ.jpeg'), [
                        'alt' => $category->title,
                        'title' => $category->title,
                        'class' => 'img-thumbnail',
                        'style' => 'width:100%'
                    ])
                    ?>
                    <div class="pop-up-box">
                        <div class="popup-content">
                            <?= $category->discription ?>
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