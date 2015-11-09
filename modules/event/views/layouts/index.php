<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetIndex;

AppAssetIndex::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title['title']) ?></title>

    <?php $this->head() ?>
    <script src="assetIndex/js_index/modernizr.custom.js"></script>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Preloader -->

<div id="preloader">
    <div id="status"></div>
</div>
<?php $path = '/images/event/category'.$this->title['id_category'].'/post'.$this->title['id_post'].'/background.jpg'?>
<!-- Home start -->
<section id="home" class="pfblock-image screen-height" style="
	background: url(<?=$path?>);
	background-color: #222;
	background-attachment: fixed;
	background-repeat: no-repeat;
	background-position: 50% 50%;
	-webkit-background-size: cover;
	   -moz-background-size: cover;
		 -o-background-size: cover;
			background-size: cover;
	padding: 0;
">
    <div class="home-overlay"></div>
    <div class="intro">
        <div class="start"><?= $this->context->id.' '.$this->title['id_category'] ?></div>
        <h1><?=$this->title['title']?></h1>
        <div class="start"><?=$this->title['id_post']?></div>
    </div>

    <a href="#title">
        <div class="scroll-down">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
        </div>
    </a>

</section>

<!-- Home end -->

<!-- Navigation start -->

<header class="header">

    <nav class="navbar navbar-custom" role="navigation">

        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Jules & Verne</a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/event/categories/events">Услуги</a></li>
                    <li><a href="#title"><?=$this->title['title']?></a></li>
                    <li><a href="#portfolio">Фотографии</a></li>
                    <li><a href="#contact">Оставить отзыв</a></li>
                </ul>
            </div>

        </div><!-- .container -->

    </nav>

</header>

<!-- Navigation end -->


        <?= $content ?>

<!-- Footer start -->

<footer id="footer">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <ul class="social-links">
                    <li><a href="index.html#" class="wow fadeInUp"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".1s"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".4s"><i class="fa fa-vk"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".7s"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay="1s"><i class="fa fa-envelope"></i></a></li>
                </ul>

                <p class="heart">
                    Made with <span class="fa fa-heart fa-2x animated pulse"></span> in Nottingham
                </p>
                <p class="copyright">
                    © 2015 John Doe | Images: <a href="https://unsplash.com/">Unsplash</a> & <a href="http://zoomwalls.com/">Zoomwalls</a>
                </p>

            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</footer>

<!-- Footer end -->

<!-- Scroll to top -->

<div class="scroll-up">
    <a href="#home"><i class="fa fa-angle-up"></i></a>
</div>

<!-- Scroll to top end-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
