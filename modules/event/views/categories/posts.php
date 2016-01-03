<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Html::encode($category->title) . ' | ' . Yii::$app->params['siteName'];
?>
<div class="site-index">
    <!-- Image Header -->
    <?php
    static $i = 1;
    static $j = 1;
    ?>
    <div class="clearfix"></div>
    <section class="slider">
        <?php foreach ($posts as $post): ?>
            <?php if ($i == 1) {
                $class = 'slide--current';
            } else {
                $class = '';
            } ?>
            <div class="slide<?= ' ' . $class ?> " data-content="<?= 'content-' . $i ?>">
                <div class="slide__mover">
                    <div class="zoomer flex-center">
                        <?= Html::img('@web/images/imac.png', ['class' => 'zoomer__image', 'alt' => 'iMac']); ?>
                        <div class="preview">
                            <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/background.jpg', ['alt' => 'iMac app preview', 'width' => '321px', 'height' => '194px',]); ?>
                            <div class="zoomer__area zoomer__area--size-5"></div>
                        </div>
                    </div>
                </div>
                <h2 class="slide__title"><span><?= $category->title ?></span><?= $post->title ?></h2>
            </div>
            <?php $i++ ?>
        <?php endforeach; ?>

        <nav class="slider__nav">
            <button class="button button--nav-prev"><i class="icon icon--arrow-left"></i><span class="text-hidden">Previous product</span>
            </button>
            <button class="button button--zoom"><i class="icon icon--zoom"></i><span
                    class="text-hidden">View details</span></button>
            <button class="button button--nav-next"><i class="icon icon--arrow-right"></i><span class="text-hidden">Next product</span>
            </button>
        </nav>
    </section>
    <!-- /slider-->
    <section class="content">
        <?php foreach ($posts as $post): ?>
            <div class="content__item" id="<?= 'content-' . $j ?>">
                <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/background.jpg', ['class' => 'content__item-img rounded-right', 'alt' => 'iMac Content']); ?>
                <div class="content__item-inner">
                    <h2><?= $category->title ?></h2>

                    <h3><?= $post->title ?></h3>

                    <?= Html::tag('p', substr_replace($post->discription, '...', 198) . Html::a('Read more', ['/event/categories/single-post', 'id' => $post->id_posts], ['class' => 'btn btn-lg btn-info']), ['class' => 'categories_discription']) ?>
                </div>
            </div>
            <?php $j++ ?>
        <?php endforeach; ?>

        <button class="button button--close"><i class="icon icon--circle-cross"></i><span class="text-hidden">Close content</span>
        </button>
    </section>

</div>
