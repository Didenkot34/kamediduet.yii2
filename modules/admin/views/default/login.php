<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveField ;

$this->title = 'Login';
?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'login-form'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>

    <div class="input-group">
        <span class="input-group-addon"><i class="icon_profile"></i></span>
        <?= $form->field($model, 'username',[ 'options' => [ 'class' => 'form-control']])->label(false)->textInput(['placeholder' => 'Login']) ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
        <?= $form->field($model, 'password',[ 'options' => [ 'class' => 'form-control','placeholder'=>'Password']])->passwordInput(['placeholder' => 'Password'])->label(false)?>
    </div>
    <label class="checkbox">
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div>{input} {label}</div>\n<div>{error}</div>",
        ]) ?>
    </label>
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>

</div>
<?php ActiveForm::end(); ?>

