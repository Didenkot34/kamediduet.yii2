<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Comments */

$this->title = 'Update Comments: ' . ' ' . $model->id_comments;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comments, 'url' => ['view', 'id' => $model->id_comments]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>