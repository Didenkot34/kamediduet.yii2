<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetTooltip;

AppAssetTooltip::register($this);
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
<body class="color-5">
<?php $this->beginBody() ?>
<div class="container">
    <!-- Top Navigation -->
    <div class="codrops-top clearfix">
        <a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/AnimatedHeaderBackgrounds/"><span>Previous Demo</span></a>
        <span class="right"><a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=20496"><span>Back to the Codrops Article</span></a></span>
    </div>
    <div class="content">
        <header class="codrops-header">
            <h1>Tooltip Styles <span>Shape &amp; effect inspiration for the modern hover tooltip</span></h1>
            <nav class="codrops-demos">
                <a href="index.html">Classic</a>
                <a href="round.html">Round</a>
                <a href="curved.html">Curved</a>
                <a href="sharp.html">Sharp</a>
                <a class="current-demo" href="bloated.html">Bloated</a>
                <a href="box.html">Box</a>
                <a href="comic.html">Comic</a>
                <a href="line.html">Line</a>
                <a href="flip.html">Flip</a>
            </nav>
        </header>


        <?= $content ?>

        <!-- Related demos -->
        <section class="related">
            <p>If you enjoyed this demo you might also like:</p>
            <a href="http://tympanus.net/Development/NotificationStyles/">
                <img src="img/related/NotificationStyles-300x162.png" />
                <h3>Notification Styles</h3>
            </a>
            <a href="http://tympanus.net/Development/DotNavigationStyles/">
                <img src="img/related/DotNavigationStyles-300x162.png" />
                <h3>Dot Navigation Styles</h3>
            </a>
        </section>
    </div><!-- /content -->
</div><!-- /container -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
