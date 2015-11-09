<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */

$this->title = [
    'id_post' => $post->id_posts,
    'title' => $post->title,
    'id_category' => $category->id_categories,
];
?>
<!-- Portfolio start -->
<section id="title" class="pfblock">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">

                <div class="pfblock-header wow fadeInUp">
                    <?= Html::tag('h2', $post->title, ['class' => 'pfblock-title']) ?>
                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        <?= $post->discription ?>
                    </div>
                </div>

            </div>

        </div>
        <!-- .row -->
    </div>
    <!-- .contaier -->
</section>
<!-- Portfolio end -->
<section id="portfolio" class="pfblock pfblock-gray">

    <div class="container">

        <div class="row">
            <?= Html::tag('h2', 'portfolio', ['class' => 'pfblock-title text-center']) ?>
            <div class="pfblock-line"></div>
            <div class="col-sm-10 col-sm-offset-1">

                <div class="flexslider wow fadeInUpBig">
                    <ul class="slides">
                        <?php foreach ($img as $number) : ?>
                            <li>
                                <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/' . $number . '.jpg', ['class' => ' img-responsive', 'alt' => 'iMac app preview']); ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container-->
</section>

<!-- Testimonial end -->
<!-- Contact start -->
<section id="contact" class="pfblock">
    <div class="container">
        <?php Pjax::begin(['id' => 'my-pjax', 'enablePushState' => false]); ?>
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">

                <div class="pfblock-header">
                    <h2 class="pfblock-title">Оставить отзыв</h2>

                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        Надеемся, что наше проведение Вашего праздника, доставило Вам удовольствие) Будем рады отызвам о
                        том
                        насколько именно Вам понравилась наша компания!
                    </div>
                </div>

            </div>

        </div>
        <!-- .row -->

        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">

                <?php
                $form = ActiveForm::begin([
                    'id' => 'comment-form',
                    'action' => ['/event/categories/save-comment'],
//                    'action' => ['/event/categories/single-post?id='.$post->id_posts],
                    'options' => [
                        'data-pjax' => true,
                        'class' => 'form-horizontal'
                    ]
                ]);
                ?>
                <div class="wow fadeInUp" data-wow-delay=".1s">
                    <?= $form->field($comment, 'id_posts')->hiddenInput(['value' => $post->id_posts])->label(false) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <?= $form->field($comment, 'users_name')->input(['class' => 'form-group wow fadeInUp']) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".3s">
                    <?= $form->field($comment, 'users_last_name')->input(['class' => 'form-group wow fadeInUp', ' data-wow-delay' => '.1s']) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".4s">
                    <?= $form->field($comment, 'users_email')->input(['class' => 'form-group wow fadeInUp', ' data-wow-delay' => '.2s']) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".6s">
                    <?= $form->field($comment, 'comments')->textarea(['rows' => 7]) ?>
                </div>
                <?= Html::submitButton('Оставить отзыв', ['class' => 'btn btn-lg btn-block wow fadeInUp', ' data-wow-delay' => '.5s', 'name' => 'comment-button']) ?>
                <?php ActiveForm::end() ?>

            </div>

        </div>
        <!-- .row -->
        <?php Pjax::end(); ?>
    </div>
    <!-- .container -->
</section>

<!-- Contact end -->
