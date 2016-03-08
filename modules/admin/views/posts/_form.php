<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_posts')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_categories')->dropdownList(
        Categories::find()->select(['title', 'id_categories'])->indexBy('id_categories')->column()
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'short_discription')->textInput(['maxlength' => true]) ?>
    <?php if (!$model->isNewRecord && !empty($arrayAllImg[0]) ): ?>
            <div class="container">
            <div class="row jumbotron">

        <h2 class="text-center">Отметьте фотографии, которые хотите удалить</h2>

                <?php foreach ($arrayAllImg as $key => $val) : ?>
                <div class="col-lg-3 "
                <table class="table table-striped">
                    <tr>
                        <td>
                            <?= Html::img(Url::toRoute('@web/images/event/category' . $model->id_categories . '/post' . $model->id_posts . '/' . $val), [
                                'class' => 'img-thumbnail',
                                'style' => 'width:200px; height:140px',
                                'data-toggle' => 'modal',
                                'data-target' => '#id' . $key
                            ]) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'checkbox[]')->checkbox(['value' => $val,'label'=>'Delete'], ['id' => 'myCheck' . $key]); ?>
                        </td>

                    </tr>
                    </table>
                     </div>
                <?php endforeach ?>

            </div>
            </div>
        </div>
        </div>
        <!-- Modal -->
        <?php foreach ($arrayAllImg as $key => $val): ?>
            <div id="id<?= $key ?>" class="modal fade" role="dialog">
                <div class="modal-dialog" style="left:5%; width: 50%">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center"><?= $model->getNameCategory($model->id_categories)  ?></h4>
                        </div>
                        <div class="modal-body">
                            <p class=" text-center"><?= $model->title ?></p>
                            <?=
                            Html::img(Url::toRoute('@web/images/event/category' . $model->id_categories . '/post' . $model->id_posts.'/'. $val), [
                                'alt' => $model->title,
                                'title' => $model->posts_img,
                                'class' => 'img-thumbnail',
                                'style' => 'width:100%'
                            ])
                            ?>
                            <div class="pop-up-box">
                                <div class="popup-content">
                                    <?= $model->discription ?>
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
<?php endif ?>
        <?php if (isset($uploadModel)) {
            echo $form->field($uploadModel, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
        }
        ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>