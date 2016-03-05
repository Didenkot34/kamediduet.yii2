<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = 'Create Orders';
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/"><?= Yii::$app->params['siteName'] ?></a></li>
            <li><i class="icon_table"></i>Tables</li>
            <li><i class="fa fa-home"></i><?= Html::a('Заказы', ['orders/']) ?></li>
            <li><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
</div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

