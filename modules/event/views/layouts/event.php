<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetEvent;

AppAssetEvent::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Main container_z_s -->
<div class="container_z_s">
    <?php
    ?>
    <!-- Blueprint header -->
    <header class="bp-header cf">
        <span>Праздник как приключение &nbsp;<span class="bp-icon bp-icon-about"
                                                   data-content="Закажите себе на праздник ВЕСЕЛЬЕ!"></span></span>

        <h1>Jules & Verne</h1>
        <nav>
            <a href="<?= Url::home() ?>" class="bp-icon bp-icon-prev" data-info="Главная"><span>Главная</span></a>
            <a href="<?= Url::toRoute('/event/categories/events') ?>" class="bp-icon bp-icon-about " data-info="Услуги"><span>Услуги</span></a>
            <?php if(!Yii::$app->user->isGuest): ?>
            <a href="<?= Url::toRoute('/admin/posts') ?>" class="bp-icon bp-icon-archive "
               data-info="Admin/posts"><span>Admin</span></a>
            <a href="<?= Url::toRoute('/admin/categories') ?>" class="bp-icon bp-icon-archive "
               data-info="Admin/categories"><span>Admin</span></a>
            <?php endif?>
        </nav>
    </header>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
