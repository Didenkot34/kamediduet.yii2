<?php
use yii\jui\AutoComplete;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
<?php use yii\web\Request;
$reguest = new Request();
echo $reguest->userIP;
?>
    <code><?= __FILE__ ?></code>

    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'username')->widget(
        AutoComplete::className(), [
        'clientOptions' => [
            'source' => $categories,
        ],
        'options'=>[
            'class'=>'form-control'
        ]
    ]);
    ?>
    <?php ActiveForm::end(); ?>
</div>
