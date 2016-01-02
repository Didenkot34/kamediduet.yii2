<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use app\assets\AppAssetAdmin;

AppAssetAdmin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="" class="logo">Admin <span class="lite"> Panel</span></a>
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
                <li>
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Search" type="text">
                    </form>
                </li>
            </ul>
            <!--  search form end -->
        </div>

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

                <!-- task notificatoin start -->
                <li id="task_notificatoin_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon-task-l"></span>
                                <span class="badge bg-important">5</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-blue"></div>
                        <li>
                            <p class="blue">You have 5 pending tasks</p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Design PSD </div>
                                    <div class="percent">90%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                        <span class="sr-only">90% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">
                                        Project 1
                                    </div>
                                    <div class="percent">30%</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                        <span class="sr-only">30% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="external">
                            <a href="#">See All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- task notificatoin end -->

                <!-- inbox notificatoin start-->
                <li id="mail_notificatoin_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-l"></i>
                        <?php if($this->params['count']['countNewComments']): ?>
                        <span class="badge bg-important"><?=$this->params['count']['countNewComments'] ?></span>
                        <?php endif ?>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-blue"></div>
                        <li>
                            <p class="blue"><?php if($this->params['count']['countNewComments']): ?>You have <?=$this->params['count']['countNewComments'] ?>
                                    <?php else: ?>
                                    You don't have
                                <?php endif ?>
                                new comments
                            </p>
                        </li>
                        <?php if($this->params['comments']['model']): ?>
                        <?php foreach ($this->params['comments']['model'] as $model): ?>
                        <li>
                                <?= Html::a('
                                <span class="photo">'.
                                    Html::img('@web/images/event/category' . $model['id_categories'] . '/post' . $model['id_posts'] . '/background.jpg', ['class' => 'img-thumbnail','width' =>'40px','height'=>'40px'])
                                .'</span>
                                    <span class="subject">
                                    <span class="from">'.$model['users_name'] . ' </span>
                                    <span class="time">' . $model['created_at'] . '</span>
                                    </span>
                                    <span class="message">
                                        ' . $model['users_last_name'] . '
                                    </span>
                                ',['/admin/comments/update', 'id' => $model['id_comments']]) ?>
                        </li>
                        <?php endforeach ?>
                        <?php endif ?>
                        <li>
                            <?= Html::a('See all comments',['/admin/comments'])?>
                        </li>
                    </ul>
                </li>
                <!-- inbox notificatoin end -->
                <!-- alert notification start-->
                <li id="alert_notificatoin_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon-bell-l"></i>
                        <?php if ($this->params['count']['countNewOrders']): ?>
                            <span class="badge bg-important"><?= $this->params['count']['countNewOrders'] ?></span>
                        <?php endif ?>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-blue"></div>
                        <li>
                            <p class="blue"><?php if ($this->params['count']['countNewOrders']): ?>You have <?= $this->params['count']['countNewOrders'] ?>
                                <?php else: ?>
                                    You don't have
                                <?php endif ?>
                                new orders
                            </p>
                        </li>
                        <?php if ($this->params['orders']['model']): ?>
                            <?php foreach ($this->params['orders']['model'] as $model): ?>
                                <li>
                                    <?= Html::a('
                                <span class="label label-primary"><i class="icon_profile"></i></span>
                                ' . $model->name . ' (' . $model->categories . ')
                                <span class="small italic pull-right">' . $model->date . '</span>
                             ', ['/admin/orders/update', 'id' => $model->id_order]) ?>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                        <li>
                            <?= Html::a('See all orders',['/admin/orders'])?>
                        </li>
                    </ul>
                </li>
                <!-- alert notification end-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <?= Html::img('@web/assetAdmin/img/avatar1_small.jpg', [
                                    'alt' => Yii::$app->user->identity->username,
                                    'title' =>  Yii::$app->user->identity->username,
                                    'with' => '30px',
                                    'height' => '30px'
                                    ]) ?>
                            </span>
                        <span class="username"><?= Yii::$app->user->identity->username?> </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                        </li>
                        <li>
                            <?= Html::a('<i class="icon_key_alt"></i> Log Out', ['default/logout']) ?>
                        <li>
                            <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="#">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_table"></i>
                        <span>Tables</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><?= Html::a('Посты', ['posts/']) ?></li>
                        <li><?= Html::a('Категории', ['categories/']) ?></li>
                        <li><?= Html::a('Отзывы', ['comments/']) ?></li>
                        <li><?= Html::a('Заказы', ['orders/']) ?></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon_documents_alt"></i>
                        <span>Pages</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="profile.html">Profile</a></li>
                        <li><a class="" href="404">404 Error</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <section id="main-content">
        <section class="wrapper">
        <?= $content ?>
        </section>
    </section>
    <!--main content end-->
</section>


<?php $this->endBody() ?>
    <script>

        //knob
        $(".knob").knob();

    </script>
</body>
</html>
<?php $this->endPage() ?>
