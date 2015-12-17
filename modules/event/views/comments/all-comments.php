<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

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
                        Можно придумать много регалий, но отзывы - расскажут больше...
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
        <?php Pjax::begin(['timeout' => 1000, 'clientOptions' => ['container' => 'pjax-container']]) ?>
        <div class="row">
            <?php foreach ($models as $model): ?>
                <div class="wow fadeInRight ">
                    <div class=" col-sm-4">
                        <?= Html::a(Html::img('@web/images/event/category' . $id_categories[$model->id_posts] . '/post' . $model->id_posts . '/background.jpg', ['class' => 'img-thumbnail']), ['/event/categories/single-post', 'id' => $model->id_posts], ['class' => 'btn btn-outline btn-default']) ?>

                    </div>
                </div>
                <div class="wow fadeInLeft ">
                    <div class="cbp-qtcontent col-sm-8 ">
                        <blockquote>
                            <p><?= $model->comments ?></p>
                            <footer>
                                <strong> <?= $model->users_name . ' ' . $model->users_last_name ?></strong>
                            </footer>
                        </blockquote>

                    </div>
                </div>
                <div class="clearfix" style="margin-bottom: 40px"></div>
            <?php endforeach ?>
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
        <?php Pjax::end() ?>
        <!-- .row -->
    </div>
    <!-- .row -->
</section>
<!-- Comments end -->
