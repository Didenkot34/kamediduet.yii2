<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <div class="well">
                    <h4>Оставить отзыв <i class="fa fa-thumbs-o-up fa-2x"></i> :</h4>
               <?php $form = ActiveForm::begin([
                   'id' => 'form-comment',
                   'action' => ['user/save-comment'],
                   
                   ]); ?>

                <?= $form->field($comment, 'id_posts')->hiddenInput(['value'=>'2'])->label(FALSE) ?>

                <?= $form->field($comment, 'id_users')?>
   
                <?= $form->field($comment, 'comments')->textarea(['class'=>'form-control','rows'=>3]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Оставить отзыв', ['class' => 'btn btn-primary', 'name' => 'saveComment-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
                </div>

