<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;

use app\models\Comments;
use yii\base\Model;
use Yii;

class SaveComment extends Model{
    public $id_posts;
    public $users_name;
    public $users_email;
    public $users_last_name;
    public $comments;
    
    public function rules()
    {
        return [
            ['id_posts', 'filter', 'filter' => 'trim'],
            ['id_posts', 'required', 'message' => 'Поле не может быть пустым.'],

            ['users_last_name', 'filter', 'filter' => 'trim'],
            ['users_last_name', 'required','message' => 'Поле не может быть пустым.'],
            
            ['users_name', 'filter', 'filter' => 'trim'],
            ['users_name', 'required','message' => 'Поле не может быть пустым.'],
            
            ['users_email', 'filter', 'filter' => 'trim'],
            ['users_email', 'required','message' => 'Поле не может быть пустым.'],
            ['users_email', 'email','message' => 'Вы ввели неприавильный формат email'],
            ['users_email', 'string', 'max' => 255],
            
            ['comments', 'required','message' => 'Поле не может быть пустым.'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id_comments' => 'Id Comments',
            'id_posts' => 'Id Posts',
            'users_name' => 'Имя',
            'users_last_name' => 'Фамилия',
            'users_email' => 'Email',
            'comments' => 'Отзыв',
            'created_at' => 'Created At',
        ];
    }
    public function saveComment()
    {
        $comment = new Comments();
        $comment->id_posts = $this->id_posts;
        $comment->users_name = $this->users_name;
        $comment->users_last_name = $this->users_last_name;
        $comment->users_email = $this->users_email;
        $comment->comments= $this->comments;
        if($comment->save()){
            return $comment;
        }
    }
}