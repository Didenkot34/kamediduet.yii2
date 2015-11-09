<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Posts;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <div class="well">
       <?php echo Alert::widget([
        'options' => [
        'class' => 'alert-info',
        ],
        'body' => 'Say hello...',
        ]);?>
        <h4>Оставить отзыв <i class="fa fa-thumbs-o-up fa-2x"></i> :</h4>
        <?php $form = ActiveForm::begin([
            'id' => 'form-comment',
            'action' => ['/event/categories/comment'],

        ]); ?>

        <?= $form->field($comment, 'id_posts')->hiddenInput(['value' => '2'])->label(FALSE) ?>

        <?= $form->field($comment, 'users_name') ?>

        <?= $form->field($comment, 'users_last_name') ?>

        <?= $form->field($comment, 'users_email') ?>

        <?= $form->field($comment, 'comments')->textarea(['class' => 'form-control', 'rows' => 3]) ?>

        <div class="form-group">
            <?= Html::submitButton('Оставить отзыв', ['class' => 'btn btn-primary', 'name' => 'saveComment-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<?php
$dataProvider = new ActiveDataProvider([
    'query' => Posts::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id_categories',
        'id_posts',
        'title',
        'discription',
        [
            'class' => 'yii\grid\ActionColumn',

        ],
        [
            'class' => 'yii\grid\CheckboxColumn',
        ],

],
]);

?>