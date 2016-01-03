<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = $post->title . ' | ' . Yii::$app->params['siteName'];
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
                <div class="fb-share-button col-sm-3 col-sm-offset-1" data-href="<?=Url::canonical()?>" data-layout="button_count"> </div>

                <div id="tw_share_button" class="col-sm-4">
                    <a href="https://twitter.com/intent/tweet?button_hashtag=JulesVerne" class="twitter-hashtag-button" data-lang="ru" data-related="didenkoT34" data-url="<?=Url::canonical()?>">Tweet #JulesVerne</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>

                <script type="text/javascript">
                    document.write(VK.Share.button(false,{
                        type: 'round',
                        url:'<?=Url::canonical()?>',
                        text: 'Поделиться'
                    }));
                </script>
                <div id="vk_share_button" class="col-sm-2" >
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
                <div class="flexslider wow fadeInRight">
                    <ul class="slides">
                        <?php foreach ($img as $number) : ?>
                            <li>
                                <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/' . $number, ['class' => ' img-responsive', 'alt' => 'photo']); ?>
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

<!-- Comment start -->
<section id="comment" class="pfblock">
    <div class="container">
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
                    'action' => '/event/categories/save-comment',
                    'id' => 'comment-form',
                    'options' => [
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
    </div>
    <!-- .container -->
</section>
<!-- Comment end -->
<!-- Alert Comment start -->
<section id="alert-comment" class="pfblock hidden">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?= Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'body' => '<strong id="commentUserName"></strong>, Ваш Комментарий успешно отправлен! Спасибо за отзыв!',
                ])
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Alert Comment end -->