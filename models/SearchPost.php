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
        ];
    }

}