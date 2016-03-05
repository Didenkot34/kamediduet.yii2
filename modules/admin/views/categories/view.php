<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */

$this->title = $model->title;
$this->title = 'Посмотреть Категорию : ' . ' "' . $model->title.'"';
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="/"><?= Yii::$app->params['siteName'] ?></a></li>
            <li><i class="icon_table"></i>Tables</li>
            <li><i class="fa fa-home"></i><?= Html::a('Категории', ['categories/']) ?></li>
            <li><i class="fa fa-user-md"></i><?= Html::encode($this->title) ?></li>
        </ol>
    </div>
</div>
<div class="categories-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_categories], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_categories], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_categories',
            'title',
            'discription',
        ],
    ]) ?>

</div>
