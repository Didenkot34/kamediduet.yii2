<?php

namespace app\models;

use Yii;
use yii\db\Query;

define('NEW_COMMENTS', 0);
define('APPROVED_COMMENTS', 1);

/**
 * This is the model class for table "comments".
 *
 * @property integer $id_comments
 * @property integer $id_posts
 * @property string $users_name
 * @property string $users_last_name
 * @property string $users_email
 * @property string $comments
 * @property string $created_at
 *
 * @property Posts $idPosts
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_posts','comments','users_name', 'users_last_name','users_email'], 'required','message'=>'Вы не заполнили это поле'],
            [['id_posts'], 'integer'],
            [['comments'], 'string'],
            [['created_at'], 'safe'],
            [['status'], 'safe'],
            [['users_name', 'users_last_name'], 'string', 'max' => 50],
            [['users_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comments' => 'Id Comments',
            'id_posts' => 'Id Posts',
            'users_name' => 'Users Name',
            'users_last_name' => 'Users Last Name',
            'users_email' => 'Users Email',
            'comments' => 'Comments',
            'created_at' => 'Created At',
            'status' => 'Status'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPosts()
    {
        return $this->hasOne(Posts::className(), ['id_posts' => 'id_posts']);
    }

    public static function getCountNewComments()
    {
        $newComments = self::find()
            ->where(['status' => NEW_COMMENTS]);
        return $newComments->count();
    }

    public static function getComments($status = APPROVED_COMMENTS)
    {
        $query = new Query();
        $query->select(['id_categories','`posts`.`id_posts`','users_name','users_last_name','comments','id_comments','created_at']);
        $query->from(['comments']);
        $query->leftJoin('posts', '`posts`.`id_posts` = `comments`.`id_posts`');
        $query->where('`comments`.`status`= '.$status);
        return $query->all();


    }

    public static function getIdCategories($status = APPROVED_COMMENTS)
    {
        $id_categories = [];
        $query = new Query();
        $query->select(['id_categories', '`posts`.`id_posts`']);
        $query->from(['comments']);
        $query->leftJoin('posts', '`posts`.`id_posts` = `comments`.`id_posts`');
        $query->where('`comments`.`status`='.$status);

        $query_categories = $query->all();

        foreach ($query_categories as $query_category) {
            $id_categories[$query_category['id_posts']] = $query_category['id_categories'];
        }

        return $id_categories;

    }
}
