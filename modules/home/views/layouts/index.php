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
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
<!--    <script src="assetIndex/js_index/modernizr.custom.js"></script>-->
</head>
<body>
<?php $this->beginBody() ?>
<!-- Preloader -->

<div id="preloader">
    <div id="status"></div>
</div>

<!-- Home start -->

<section id="home" class="pfblock-image screen-height">
    <div class="home-overlay"></div>
    <div class="intro">
        <div class="start">KAMEDU DYET</div>
        <h1>Jules & Verne</h1>
        <div class="start">праздник как приключение</div>
    </div>

    <a href="#services">
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
                <a class="navbar-brand" href="index.html">Jules & Verne</a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Works</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
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
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".2s"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".4s"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="index.html#" class="wow fadeInUp" data-wow-delay=".5s"><i class="fa fa-envelope"></i></a></li>
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
