<?php

namespace app\models;

use Yii;
use yii\db\Query;

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

    public static function getAllComments()
    {
        $query = new Query();
        $query->select(['id_categories','`posts`.`id_posts`','users_name','users_last_name','comments']);
        $query->from(['comments']);
        $query->leftJoin('posts', '`posts`.`id_posts` = `comments`.`id_posts`');
        $query->where('`comments`.`status`=1');
        //print_r($query->all());exit;
        return $query->all();


    }

    public static function getIdCategories()
    {
        $id_categories = [];
        $query = new Query();
        $query->select(['id_categories', '`posts`.`id_posts`']);
        $query->from(['comments']);
        $query->leftJoin('posts', '`posts`.`id_posts` = `comments`.`id_posts`');
        $query->where('`comments`.`status`=1');

        $query_categories = $query->all();

        foreach ($query_categories as $query_category) {
            $id_categories[$query_category['id_posts']] = $query_category['id_categories'];
        }

        return $id_categories;

    }
}
