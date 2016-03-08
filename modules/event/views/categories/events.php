<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
/* @var $this yii\web\View */
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;

$this->title = 'Услуги | '.Yii::$app->params['siteName'];
?>

<div class="clearfix"></div>
<div class="row">
    <div class=" col-lg-12">
        <section class="slider">
            <?php foreach ($categories as $category): ?>
                <?php if ($category->id_categories == 1) {
                    $class = 'slide--current';
                } else {
                    $class = '';
                } ?>

                <div class="slide<?= ' ' . $class ?> " data-content="<?= 'content-' . $category->id_categories ?>">
                    <div class="slide__mover">
                        <div class="zoomer flex-center">
                            <?= Html::img('@web/images/imac.png', ['class' => 'zoomer__image', 'alt' => 'iMac']); ?>
                            <div class="preview">
                                <?= Html::img('@web/images/cat' . $category->id_categories . '/'.$category->categories_img, [
                                    'alt' => $category->title,
                                    'class' => 'img-thumbnail',
                                    'width' => '320px',
                                ]); ?>
                                <div class="zoomer__area zoomer__area--size-5"></div>
                            </div>
                        </div>
                    </div>
                    <h2 class="slide__title"><span>УСЛУГИ</span> <?= $category->title ?></h2>
                </div>
            <?php endforeach; ?>

            <nav class="slider__nav">
                <button class="button button--nav-prev"><i class="icon icon--arrow-left"></i><span class="text-hidden">Previous product</span>
                </button>
                <button class="button button--zoom"><i class="icon icon--zoom"></i><span class="text-hidden">View details</span>
                </button>
                <button class="button button--nav-next"><i class="icon icon--arrow-right"></i><span class="text-hidden">Next product</span>
                </button>
            </nav>

        </section>
        <!-- /slider-->
        <section class="content">
            <?php foreach ($categories as $category): ?>
                <div class="content__item" id="<?= 'content-' . $category->id_categories ?>">
                    <?= Html::img('@web/images/cat' . $category->id_categories . '/'.$category->categories_img, ['class' => 'content__item-img rounded-right', 'alt' => $category->title]); ?>
                    <div class="content__item-inner">
                        <h2><?= $category->title ?></h2>

                        <h3>С нами, прадник как приключение</h3>
                        <?= Html::tag('p', $category->discription, ['class' => 'categories_discription']) ?>
                        <p><?= Html::a('Наши работы по данной теме =>', ['/event/categories/posts', 'id' => $category->id_categories], ['class' => 'btn btn-lg btn-success']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <button class="button button--close"><i class="icon icon--circle-cross"></i><span class="text-hidden">Close content</span>
            </button>
        </section>
    </div>
</div>