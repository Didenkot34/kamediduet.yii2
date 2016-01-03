<?php
use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;
 $this->title = 'Видео | '. Yii::$app->params['siteName'];
?>
<div id="title" class="event-video-index">
    <section id="video" class="pfblock pfblock-red">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="pfblock-header wow fadeInUp">
                        <?= Html::tag('h2', 'Наши Видео', ['class' => 'iconbox-title']) ?>
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
            <table class="table">
                <tr>
                    <td>
                        <div class="fb-share-button " data-href="<?=Url::canonical()?>" data-layout="button_count"> </div>
                    </td>
                    <td>
                        <div id="tw_share_button" class="">
                            <a href="https://twitter.com/intent/tweet?button_hashtag=JulesVerne" class="twitter-hashtag-button" data-lang="ru" data-related="didenkoT34" data-url="<?=Url::canonical()?>">Tweet #JulesVerne</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                    </td>
                    <td>
                        <script type="text/javascript">
                            document.write(VK.Share.button(false,{
                                type: 'round',
                                url:'<?=Url::canonical()?>',
                                text: 'Поделиться'
                            }));
                        </script>
                        <div id="vk_share_button" >
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- .container -->
    </section>
    <!-- Video end -->
</div>