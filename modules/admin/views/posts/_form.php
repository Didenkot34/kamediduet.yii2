<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Posts */
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

    <?= $form->field($model, 'numbers_img')->textInput() ?>


    <?php if (isset($uploadModel)) {
        echo $form->field($uploadModel, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']);
    }
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
