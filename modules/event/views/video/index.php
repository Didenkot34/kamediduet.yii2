<?php
use yii\helpers\Html;
use yii\bootstrap\Tabs;
use app\assets\AppAssetIndex;
 $this->title = 'Видео';
?>
<div id="title" class="event-video-index">
    <section id="video" class="pfblock pfblock-red">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="pfblock-header wow fadeInUp">
                        <?= Html::tag('h2', Html::a('Наши Видео', ['/event/categories/events'], ['class' => 'pfblock-title fa_color']), ['class' => 'iconbox-title']) ?>
                        <div class="pfblock-line"></div>
                        <div class="pfblock-subtitle">
                            Камеди дуэт «Жюль и Верн» в разных телепроектах, а также на разных мероприятиях. То как с нами весело, можно увидеть на видео.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?=
                    Tabs::widget([
                        'items' => [
                            [
                                'label' => 'Мы на телепроектах',
                                'content' => '
                    <div class="row">
                        <div class="col-sm-12">
                            <iframe width="100%" height="600" src="https://www.youtube.com/embed/_KONbvtyn6o" frameborder="100" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <iframe width="100%" height="600" src="https://www.youtube.com/embed/ADptd5EakG8" frameborder="100" allowfullscreen></iframe>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <iframe width="100%" height="600" src="https://www.youtube.com/embed/lCd5WWHtXU0" frameborder="100" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <iframe width="100%" height="600" src="https://www.youtube.com/embed/-4XIwGVCqh4" frameborder="100" allowfullscreen></iframe>
                        </div>
                    </div>
                    ',
                                'active' => true,
                            ],
                            [
                                'label' => 'Выпускные',
                                'content' => '
                        <div class="row">
                            <div class="col-sm-12">
                                 <iframe width="100%" height="600" src="https://www.youtube.com/embed/8cJQsLSVEh0" frameborder="100" allowfullscreen></iframe>
                            </div>
                        </div>
                                ',
                                'headerOptions' => [],
                            ],
                            [
                                'label' => 'Свадьбы',
                                'content' => '
                        <div class="row">
                            <div class="col-sm-12">
                                 <iframe width="100%" height="600" src="https://www.youtube.com/embed/tuiAm0boTOo" frameborder="100" allowfullscreen></iframe>
                            </div>
                        </div>
                                ',
                                'headerOptions' => [],
                                'options' => ['id' => 'wedding'],
                            ],
                            [
                                'label' => 'Дни Рождения',
                                'content' => '
                        <div class="row">
                            <div class="col-sm-12">
                                 <iframe width="100%" height="600" src="https://www.youtube.com/embed/ZhvObN6QOqw" frameborder="100" allowfullscreen></iframe>
                            </div>
                        </div>
                                ',
                                'headerOptions' => [],
                                'options' => ['id' => 'hb'],
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </section>
    <!-- Video end -->
</div>