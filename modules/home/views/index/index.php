<?php
use yii\helpers\Html;
?>
<!-- Services start -->
<section id="services" class="pfblock pfblock-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp">
                    <?= Html::tag('h2',Html::a('Наши услуги', ['/event/categories/events'], ['class' => 'pfblock-title fa_color']),['class'=>'iconbox-title'])?>
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
                        <?= Html::tag('h3',Html::a('Свадьбы', ['/event/categories/posts','id'=>1], ['class' => 'btn btn-outline btn-info']),['class'=>'iconbox-title'])?>
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
                        <?= Html::tag('h3',Html::a('Корпоративы', ['/event/categories/posts','id'=>2], ['class' => 'btn btn-outline btn-info']),['class'=>'iconbox-title'])?>

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
                        <?= Html::tag('h3',Html::a('Дни Рождения', ['/event/categories/posts','id'=>3], ['class' => 'btn btn-outline btn-info']),['class'=>'iconbox-title'])?>
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
                        <?= Html::tag('h3',Html::a('Выпускные', ['/event/categories/posts','id'=>4], ['class' => 'btn btn-outline btn-info']),['class'=>'iconbox-title'])?>
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
<?php foreach($posts as $post): ?>
            <div class="col-md-4">
                <div class="grid wow zoomIn">
                    <figure class="effect-bubba">
                        <?= Html::img('@web/images/event/category' . $post->id_categories . '/post' . $post->id_posts . '/background.jpg', ['class' => 'img-thumbnail', 'alt' => $post->title]); ?>
                        <figcaption>
                            <h2><?= Html::a($post->title, ['/event/categories/single-post','id'=>$post->id_posts], ['class' => 'btn btn-outline btn-default']) ?></h2>
                            <?= Html::tag('p', $post->short_discription)?>
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

<!-- Skills start -->
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
            <div class="col-sm-6 col-md-3 text-center">
						<span data-percent="100" class="chart easyPieChart heart"
                              style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="fa fa-heart fa-2x animated pulse"></span>
                        </span>
                <h3 class="text-center">Programming</h3>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
						<span data-percent="90" class="chart easyPieChart"
                              style="width: 140px; height: 140px; line-height: 140px;">
                            <span><i class="fa fa-battery-half fa-"></i></span>
                        </span>
                <h3 class="text-center">Design</h3>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
						<span data-percent="85" class="chart easyPieChart"
                              style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">85</span>
                        </span>
                <h3 class="text-center">Marketing</h3>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
						<span data-percent="95" class="chart easyPieChart"
                              style="width: 140px; height: 140px; line-height: 140px;">
                            <span class="percent">95</span>
                        </span>
                <h3 class="text-center">UI / UX</h3>
            </div>
        </div>
        <!--End row -->
    </div>
</section>
<!-- Skills end -->
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
                <a href="#contact" class="btn btn-lg">Закажи нас</a>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>
<!-- CallToAction end -->

<!-- Testimonials start -->
<section id="testimonials" class="pfblock pfblock-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="pfblock-header wow fadeInUp ">
                    <?= Html::tag('h2', 'Отзывы о нашей работе',['class'=>'pfblock-title'])?>
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
            <div id="cbp-qtrotator" class="cbp-qtrotator">
<?php foreach($comments as $comment): ?>
                <div class="cbp-qtcontent">
                    <?= Html::img('@web/images/event/category'.$comment['id_categories'].'/post' . $comment['id_posts'] . '/background.jpg', ['class' => 'img-thumbnail','width'=>'210px','height'=>'140px']); ?>

                    <blockquote>
                        <p><?=$comment['comments'] ?></p>
                        <footer><strong> <?=$comment['users_name'].' '. $comment['users_last_name'] ?></strong></footer>
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

