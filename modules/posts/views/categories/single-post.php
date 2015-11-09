<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row headline"><!-- Begin Headline -->

    <!-- Slider Carousel
   ================================================== -->
    <div class="span8">
        <div class="flexslider">
            <ul class="slides">
                <li><img src="/assetPiccolo/img/gallery/slider-img.jpg" alt="slider" /></li>
                <li><img src="/assetPiccolo/img/gallery/slider-img.jpg" alt="slider" /></li>
                <li><img src="/assetPiccolo/img/gallery/slider-img.jpg" alt="slider" /></li>
                <li><img src="/assetPiccolo/img/gallery/slider-img.jpg" alt="slider" /></li>
                <li><img src="/assetPiccolo/img/gallery/slider-img.jpg" alt="slider" /></li>
            </ul>
        </div>
    </div>

    <!-- Headline Text
    ================================================== -->
    <div class="span4">
        <?= Html::tag('h3', $post->title) ?>
        <?= Html::tag('p', $category->title, ['class' => 'lead post_d']) ?>
        <?= Html::tag('p', $post->discription, ['class' => 'post_d']) ?>
        <a href="#"><i class="icon-plus-sign"></i>Read More</a>
    </div>
</div><!-- End Headline -->

<div class="row"><!-- Begin Bottom Section -->

    <!-- Blog Preview
    ================================================== -->
    <div class="span6">

        <h5 class="title-bg">From the Blog
            <small>All the latest news</small>
            <button id="btn-blog-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
            <button id="btn-blog-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
        </h5>

        <div id="blogCarousel" class="carousel slide ">
<?php static $i=1?>
            <!-- Carousel items -->
            <div class="carousel-inner">

                <?php foreach ($posts as $single_post): ?>
                    <?php if($i == 1){$class='active item';}else{$class='item';}?>
                    <!-- Blog Item 1 -->
                    <div class="<?=$class.' '?>">
                        <?= Html::a('<img src="/assetPiccolo/img/gallery/blog-med-img-1.jpg" alt="" class="align-left blog-thumb-preview" />', ['/posts/categories/single-post', 'id' => $single_post->id_posts]) ?>

                        <div class="post-info clearfix ">
                            <?= Html::tag('h4',Html::a( $single_post->title, ['/posts/categories/single-post', 'id' => $single_post->id_posts]), ['class' => 'post_title']) ?>
                            <ul class="blog-details-preview">
                                <li><i class="icon-calendar"></i><strong>Posted on:</strong> <?=$category->title?><li>
                                <li><i class="icon-user"></i><strong>Posted by:</strong> <a href="#" title="Link">Admin</a><li>
                                <li><i class="icon-comment"></i><strong>Comments:</strong> <a href="#" title="Link">12</a><li>
<!--                                <li><i class="icon-tags"></i> <a href="#">photoshop</a>, <a href="#">tutorials</a></li>-->
                            </ul>
                        </div>
                        <p class="blog-summary"><?=substr_replace($single_post->discription,'...', 198)?> <?= Html::a('Read more', ['/posts/categories/single-post', 'id' => $single_post->id_posts]) ?><p>
                    </div>
                    <?php $i++?>
                <?php endforeach; ?>

            </div>

        </div>

    </div>

    <!-- Client Area
    ================================================== -->
    <div class="span6">

        <h5 class="title-bg">Recent Clients
            <small>That love us</small>
            <button id="btn-client-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
            <button id="btn-client-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
        </h5>

        <!-- Client Testimonial Slider-->
        <div id="clientCarousel" class="carousel slide no-margin">
            <!-- Carousel items -->
            <div class="carousel-inner">

                <div class="active item">
                    <p class="quote-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices. Vivamus nec lectus sed orci molestie molestie."<cite>- Client Name, Big Company</cite></p>
                </div>

                <div class="item">
                    <p class="quote-text">"Adipiscing elit. In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices. Vivamus nec lectus sed orci molestie molestie."<cite>- Another Client Name, Company Name</cite></p>
                </div>

                <div class="item">
                    <p class="quote-text">"Mauris eget tellus sem. Cras sollicitudin sem eu elit aliquam quis condimentum nulla suscipit. Nam sed magna ante. Ut eget suscipit mauris."<cite>- On More Client, The Company</cite></p>
                </div>

            </div>
        </div>

        <!-- Client Logo Thumbs-->
        <ul class="client-logos">
            <li><a href="#" class="client-link"><img src="/assetPiccolo/img/gallery/client-img-1.png" alt="Client"></a></li>
            <li><a href="#" class="client-link"><img src="/assetPiccolo/img/gallery/client-img-2.png" alt="Client"></a></li>
            <li><a href="#" class="client-link"><img src="/assetPiccolo/img/gallery/client-img-3.png" alt="Client"></a></li>
            <li><a href="#" class="client-link"><img src="/assetPiccolo/img/gallery/client-img-4.png" alt="Client"></a></li>
            <li><a href="#" class="client-link"><img src="/assetPiccolo/img/gallery/client-img-5.png" alt="Client"></a></li>
        </ul>

    </div>

</div><!-- End Bottom Section -->

</div> <!-- End Container -->

<!-- Footer Area
    ================================================== -->

<div class="footer-container"><!-- Begin Footer -->
    <div class="container">
        <div class="row footer-row">
            <div class="span3 footer-col">
                <h5>About Us</h5>
                <img src="/assetPiccolo/img/piccolo-footer-logo.png" alt="Piccolo" /><br /><br />
                <address>
                    <strong>Design Team</strong><br />
                    123 Main St, Suite 500<br />
                    New York, NY 12345<br />
                </address>
                <ul class="social-icons">
                    <li><a href="#" class="social-icon facebook"></a></li>
                    <li><a href="#" class="social-icon twitter"></a></li>
                    <li><a href="#" class="social-icon dribble"></a></li>
                    <li><a href="#" class="social-icon rss"></a></li>
                    <li><a href="#" class="social-icon forrst"></a></li>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Latest Tweets</h5>
                <ul>
                    <li><a href="#">@room122</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li><a href="#">@room122</a> In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices.</li>
                    <li><a href="#">@room122</a> Vivamus nec lectus sed orci molestie molestie. Etiam mattis neque eu orci rutrum aliquam.</li>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Latest Posts</h5>
                <ul class="post-list">
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Consectetur adipiscing elit est lacus gravida</a></li>
                    <li><a href="#">Lectus sed orci molestie molestie etiam</a></li>
                    <li><a href="#">Mattis consectetur adipiscing elit est lacus</a></li>
                    <li><a href="#">Cras rutrum, massa non blandit convallis est</a></li>
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Flickr Photos</h5>
                <ul class="img-feed">
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                    <li><a href="#"><img src="/assetPiccolo/img/gallery/flickr-img-1.jpg" alt="Image Feed"></a></li>
                </ul>
            </div>
        </div>
