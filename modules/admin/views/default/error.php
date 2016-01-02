<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\base\ErrorException;

$this->title = $name;
?>

    <p class="text-404">404</p>
<div class="alert alert-danger">
    <?= nl2br(Html::encode($message)) ?>
</div>
        <a href="/">Вернуться на главную</a></p>
    <h1 id="error"></h1>


