<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\base\ErrorException;

$this->title = $name;
?>
<div id="site-error"  >

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <h1 id="error"></h1>
</div>

