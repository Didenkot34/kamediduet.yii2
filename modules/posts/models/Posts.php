<?php

namespace app\modules\posts\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id_posts
 * @property integer $id_categories
 * @property string $title
 * @property string $discription
 * @property string $short_discription
 *
 * @property Comments[] $comments
 * @property Categories $idCategories
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categories'], 'integer'],
            [['discription'], 'string'],
            [['short_discription'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['short_discription'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_posts' => 'Id Posts',
            'id_categories' => 'Id Categories',
            'title' => 'Title',
            'discription' => 'Discription',
            'short_discription' => 'Short Discription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['id_posts' => 'id_posts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategories()
    {
        return $this->hasOne(Categories::className(), ['id_categories' => 'id_categories']);
    }
}
