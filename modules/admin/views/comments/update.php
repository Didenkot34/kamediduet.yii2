<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comments */

$this->title = 'Обновить Отзыв №'. $model->id_comments .' : ' . $model->users_name;
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/"><?= Yii::$app->params['siteName'] ?></a></li>
            <li><i class="icon_table"></i>Tables</li>
            <li><i class="fa fa-home"></i><?= Html::a('Отзывы', ['comments/']) ?></li>
            <li><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
</div>
    <div class="comments-update">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
