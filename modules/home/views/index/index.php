<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;
use \yii\widgets\MaskedInput;
use \yii\jui\DatePicker;
use app\models\Categories;
?>
<!-- Services start -->
<section id="services" class="pfblock pfblock-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp">
                    <?= Html::tag('h2', Html::a('Наши услуги', ['/event/categories/events'], ['class' => 'pfblock-title fa_color']), ['class' => 'iconbox-title']) ?>
                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        No one lights a lamp in order to hide it behind the door: the purpose of light is to create more
                        light, to open people’s eyes, to reveal the marvels around.
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="iconbox wow slideInLeft ">
                    <div class="iconbox-icon">
                        <span class="fa_color fa fa-venus-mars fa-3x"></span>
                    </div>
                    <div class="iconbox-text">
                        <?= Html::tag('h3', Html::a('Свадьбы', ['/event/categories/posts', 'id' => 1], ['class' => 'btn btn-outline btn-info']), ['class' => 'iconbox-title']) ?>
                        <div class="iconbox-desc">
                            Good things come to those who wait, but only the things left by those who hustle
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="iconbox wow slideInLeft">
                    <div class="iconbox-icon">
                        <span class="fa_color fa fa-users fa-3x"></span>
                    </div>
                    <div class="iconbox-text">
                        <?= Html::tag('h3', Html::a('Корпоративы', ['/event/categories/posts', 'id' => 2], ['class' => 'btn btn-outline btn-info']), ['class' => 'iconbox-title']) ?>

                        <div class="iconbox-desc">
                            Good things come to those who wait, but only the things left by those who hustle
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="iconbox wow slideInRight">
                    <div class="iconbox-icon">
                        <span class="fa_color fa fa-birthday-cake fa-3x"></span>
                    </div>
                    <div class="iconbox-text">
                        <?= Html::tag('h3', Html::a('Дни Рождения', ['/event/categories/posts', 'id' => 3], ['class' => 'btn btn-outline btn-info']), ['class' => 'iconbox-title']) ?>
                        <div class="iconbox-desc">
                            Good things come to those who wait, but only the things left by those who hustle
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="iconbox wow slideInRight">
                    <div class="iconbox-icon">
                        <span class="fa_color fa fa-bell-o fa-3x"></span>
                    </div>
                    <div class="iconbox-text">
                        <?= Html::tag('h3', Html::a('Выпускные', ['/event/categories/posts', 'id' => 4], ['class' => 'btn btn-outline btn-info']), ['class' => 'iconbox-title']) ?>
                        <div class="iconbox-desc">
                            Good things come to those who wait, but only the things left by those who hustle
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- Services end -->
<!-- Portfolio start -->
<section id="portfolio" class="pfblock">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp">
                    <h2 class="pfblock-title">Последние мероприятия</h2>

                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        No one lights a lamp in order to hide it behind the door: the purpose of light is to create more
                        light, to open people’s eyes, to reveal the marvels around.
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row ">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="grid wow zoomIn">
                        <figure class="effect-bubba">
                            <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/background.jpg', ['class' => 'img-thumbnail', 'alt' => $post->title]); ?>
                            <figcaption>
                                <h2><?= Html::a($post->title, ['/event/categories/single-post', 'id' => $post->id_posts], ['class' => 'btn btn-outline btn-default']) ?></h2>
                                <?= Html::tag('p', $post->short_discription) ?>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- .contaier -->
</section>
<!-- Portfolio end -->

<!-- Our Team -->
<section class="pfblock pfblock-gray" id="skills">
    <div class="container">
        <div class="row skills">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="pfblock-header wow fadeInUp">
                        <h2 class="pfblock-title">Наша команда</h2>

                        <div class="pfblock-line"></div>
                        <div class="pfblock-subtitle">
                            No one lights a lamp in order to hide it behind the door: the purpose of light is to create
                            more light, to open people’s eyes, to reveal the marvels around.
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <div class="col-md-4">
                <div class="grid wow zoomInLeft">
                    <figure class="effect-bubba">
                        <?= Html::img('@web/images/our_team/Koval.jpg', ['class' => 'img-thumbnail', 'alt' => 'Koval']); ?>
                        <figcaption>
                            <h2>Коваль Павел</h2>
                            <?= Html::tag('p', 'Ведущий <ul class="social-links">
                                <li><a href="https://www.facebook.com/pavel.koval.50" target="_blank" class="wow fadeInUp"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/paolokovalli" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".1s"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://vk.com/pavelkoval" target="_blank" class="wow fadeInUp" data-wow-delay=".4s"><i
                                            class="fa fa-vk"></i></a>
                                </li>
                                <li><a href="http://instagram.com/pavelkoval" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".7s"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/profile/view?id=AAIAABXrOukB21utdsHN2q0f9Q6lV9RO4BoF1nc&trk=nav_responsive_tab_profile"
                                       target="_blank" class="wow fadeInUp" data-wow-delay="1s"><i
                                            class="fa fa-linkedin"></i></a></li>
                            </ul>') ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid wow zoomIn">
                    <figure class="effect-bubba">
                        <?= Html::img('@web/images/our_team/Didenko.jpg', ['class' => 'img-thumbnail', 'alt' => 'Didenko']); ?>
                        <figcaption>
                            <h2>Диденко Юрий</h2>
                            <?= Html::tag('p', 'Ведущий <ul class="social-links">
                                <li><a href="https://www.facebook.com/ura.didenko" target="_blank" class="wow fadeInUp"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/didenkoT34" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".1s"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://vk.com/didenkot34" target="_blank" class="wow fadeInUp" data-wow-delay=".4s"><i
                                            class="fa fa-vk"></i></a>
                                </li>
                                <li><a href="http://instagram.com/ura.didenko" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".7s"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/profile/view?id=AAIAABXrOukB21utdsHN2q0f9Q6lV9RO4BoF1nc&trk=nav_responsive_tab_profile"
                                       target="_blank" class="wow fadeInUp" data-wow-delay="1s"><i
                                            class="fa fa-linkedin"></i></a></li>
                            </ul>') ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid wow zoomInRight">
                    <figure class="effect-bubba">
                        <?= Html::img('@web/images/our_team/Penzev.jpg', ['class' => 'img-thumbnail', 'alt' => 'dj-Penzev']); ?>
                        <figcaption>
                            <h2>Пензев Павел</h2>
                            <?= Html::tag('p', ' dj  <ul class="social-links">
                                <li><a href="https://www.facebook.com/ura.didenko" target="_blank" class="wow fadeInUp"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/didenkoT34" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".1s"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a href="https://vk.com/kamediduet" target="_blank" class="wow fadeInUp" data-wow-delay=".4s"><i
                                            class="fa fa-vk"></i></a>
                                </li>
                                <li><a href="http://instagram.com/ura.didenko" target="_blank" class="wow fadeInUp"
                                       data-wow-delay=".7s"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/profile/view?id=AAIAABXrOukB21utdsHN2q0f9Q6lV9RO4BoF1nc&trk=nav_responsive_tab_profile"
                                       target="_blank" class="wow fadeInUp" data-wow-delay="1s"><i
                                            class="fa fa-linkedin"></i></a></li>
                            </ul>') ?>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <!--End row -->
    </div>
</section>
<!-- Our Team end -->
<!-- CallToAction start -->
<section class="calltoaction">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h2 class="wow slideInRight" data-wow-delay=".1s">ТЕБЕ СКУЧНО И ОДИНОКО?</h2>

                <div class="calltoaction-decription wow slideInLeft" data-wow-delay=".5s">
                    закажи себе на праздник камеди дует "Жуль и Верн"
                </div>
            </div>
            <div class="col-md-12 col-lg-12 calltoaction-btn wow slideInDown" data-wow-delay=".7s">
                <a id="click-order" href="#order" class="btn btn-lg">Закажи нас</a>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- CallToAction end -->

<!-- Order start -->
<section id="order" class="pfblock hidden ">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header">
                    <h2 class="pfblock-title">Форма Заказа</h2>

                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        Заполните пожалуйста все необходимые поля. И мы в ближайшее время созвонимся с Вами.
                    </div>
                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'order-form',
                    'options' => [
                        'class' => 'form-horizontal'
                    ]
                ]);
                ?>
                <div class="wow fadeInUp" data-wow-delay=".1s">
                    <?= $form->field($model, 'name') ?>
                </div>
                <?= $form->field($model, 'categories')->dropdownList(
                    Categories::find()->select(['title', 'id_categories'])->indexBy('title')->column()
                ); ?>
                <div class="wow fadeInUp" data-wow-delay=".1s">
                    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'language' => 'ru',
                        'dateFormat' => 'dd-MM-yyyy',
                    ]) ?>
                </div>

                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <?= $form->field($model, 'time_event')->widget(MaskedInput::className(),[
                        'mask' => '99:99'
                    ]) ?>
                </div>

                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <?= $form->field($model, 'email')->widget(MaskedInput::className(),[
                        'clientOptions' => [
                            'alias' =>  'email'
                        ],
                    ]) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <?= $form->field($model, 'tel')->widget(MaskedInput::className(),[
                        'mask' => '(999) 999-9999'
                    ]) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".4s">
                    <?= $form->field($model, 'subject')->textArea(['rows' => 6]) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".6s">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".6s">
                <?= Html::submitButton('Отправить заказ', ['class' => 'btn btn-lg btn-block wow fadeInUp', ' data-wow-delay' => '.5s', 'name' => 'order-button']) ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- Order end -->
<!-- Alert Comment start -->
<section id="alert-order" class="pfblock hidden">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?= Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'body' => '<strong id="orderUserName"></strong>, Ваш Комментарий успешно отправлен! Спасибо за отзыв!',
                ])
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Alert Comment end -->

<!-- Testimonials start -->
<section id="testimonials" class="pfblock pfblock-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp ">
                    <?= Html::tag('h2', 'Отзывы о нашей работе', ['class' => 'pfblock-title']) ?>
                    <div class="pfblock-line"></div>
                    <div class="pfblock-subtitle">
                        Можно придумать много регалий, но отзывы - расскажут больше...
                    </div>
                    <h4><?= Html::a('Все Отзывы', ['/event/comments/all-comments'], ['class' => 'btn btn-info btn-lgt']) ?></h4>

                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div id="cbp-qtrotator" class="cbp-qtrotator">
                <?php foreach ($comments as $comment): ?>
                    <div class="cbp-qtcontent">
                        <?= Html::img('@web/images/event/category' . $comment['id_categories'] . '/post' . $comment['id_posts'] . '/background.jpg', ['class' => 'img-thumbnail', 'width' => '210px', 'height' => '140px']); ?>

                        <blockquote>
                            <p><?= $comment['comments'] ?></p>
                            <footer><strong> <?= $comment['users_name'] . ' ' . $comment['users_last_name'] ?></strong>
                            </footer>
                        </blockquote>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .row -->
</section>
<!-- Testimonial end -->
<!-- Contact start -->

<!-- Contact end -->

