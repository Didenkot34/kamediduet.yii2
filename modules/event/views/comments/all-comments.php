<?php
use yii\helpers\Html;
$this->title = 'Отзывы';
?>
<!-- Comments start -->
<section id="all-comments" class="pfblock pfblock-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp ">
                    <?= Html::tag('h2', 'Отзывы о нашей работе', ['class' => 'pfblock-title']) ?>
                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        No one lights a lamp in order to hide it behind the door: the purpose of light is to create more
                        light, to open people’s eyes, to reveal the marvels around.
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <?php foreach ($comments as $comment): ?>
                <div class="wow fadeInRight ">
                    <div class=" col-sm-4">
                        <?= Html::img('@web/images/event/category' . $comment['id_categories'] . '/post' . $comment['id_posts'] . '/background.jpg', ['class' => 'img-thumbnail']); ?>
                        <footer class=" alert-info text-center">
                            <strong> <?= $comment['users_name'] . ' ' . $comment['users_last_name'] ?></strong>
                        </footer>
                    </div>
                </div>
                <div class="wow fadeInLeft ">
                    <div class="cbp-qtcontent col-sm-8 ">
                        <blockquote>
                            <p><?= $comment['comments'] ?></p>
                        </blockquote>

                    </div>
                </div>
                <div class="clearfix" style="margin-bottom: 40px"></div>
            <?php endforeach ?>
        </div>
        <!-- .row -->
    </div>
    <!-- .row -->
</section>
<!-- Comments end -->
