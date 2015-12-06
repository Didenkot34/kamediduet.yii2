<?php
namespace app\models;

use Yii;
use yii\base\Model;


class SearchPost extends Model
{
    public $title;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title'], 'required','message'=>'Поле не может быть пустым'],
//            [['title'],'validateTitle']
        ];
    }

//    public function validateTitle()
//    {
//        $post = Posts::find()
//            ->where(['title' => $this->title])
//            ->one();
//        if (!isset($post)) {
//            $this->addError('title', 'Такого поста не существует. Возможно Вы сделали опечатку.');
//        }
//    }

}