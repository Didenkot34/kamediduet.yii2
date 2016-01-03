<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ButtonDropdown ;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Collapse ;
use yii\bootstrap\Tabs ;
use yii\bootstrap\Alert ;

$this->title = 'Signup |  '. Yii::$app->params['siteName'];
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
<?php
Modal::begin([
    'header' => '<h4 class="modal-title">Sign Up</h4>',
    'toggleButton' => ['label' => '<i class="glyphicon glyphicon-th-list"></i> Click to Sign Up', 'class' => 'btn btn-primary']
]);
?>
  <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>
   
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
<?php
Modal::end();
?>
        </div>
    </div>
</div>
<br />
<?php
echo ButtonDropdown::widget([
    'label' => 'Action',
    'dropdown' => [
        'items' => [
            ['label' => 'DropdownA', 'url' => '/'],
            ['label' => 'DropdownB', 'url' => '#'],
        ],
    ],
]);
?>
<br />
<?php
echo Collapse::widget([
    'items' => [
        // equivalent to the above
        [
            'label' => 'Collapsible Group Item #1',
            'content' => 'Anim pariatur cliche...',
            // open its content by default
            'contentOptions' => ['class' => 'in']
        ],
        // another group item
        [
            'label' => 'Collapsible Group Item #1',
            'content' => 'Anim pariatur cliche...',
            'contentOptions' => ['...'],
            'options' => [''],
        ],
        // if you want to swap out .panel-body with .list-group, you may use the following
        [
            'label' => 'Collapsible Group Item #1',
            'content' => [
                'Anim pariatur cliche...',
                'Anim pariatur cliche...'
            ],
            'contentOptions' => ['...'],
            'options' => [''],
            'footer' => 'Footer' // the footer label in list-group
        ],
    ]
]);
?>

<br />
<br />
<br />
<br />
<?php
echo Tabs::widget([
    'items' => [
        [
            'label' => 'One',
            'content' => 'Anim pariatur cliche...',
            'active' => true
        ],
        [
            'label' => 'Two',
            'content' => 'Anim pariatur cliche...',
            'headerOptions' => ['...'],
            'options' => ['id' => 'myveryownID'],
        ],
        [
            'label' => 'Example',
            'url' => 'http://www.example.com',
        ],
        [
            'label' => 'Dropdown',
            'items' => [
                 [
                     'label' => 'DropdownA',
                     'content' => 'DropdownA, Anim pariatur cliche...',
                 ],
                 [
                     'label' => 'DropdownB',
                     'content' => 'DropdownB, Anim pariatur cliche...',
                 ],
            ],
        ],
    ],
]);

?>
<br />
<?php
Alert::begin([
    'options' => [
        'class' => 'alert-warning',
    ],
]);

echo 'Say hello...';

Alert::end();
?>
<?php

?>
