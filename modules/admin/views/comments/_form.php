<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_posts')->textInput() ?>

    <?= $form->field($model, 'users_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList([
        0 =>'Новый комментарий',
        1 => 'Утвержденный комментарий'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
