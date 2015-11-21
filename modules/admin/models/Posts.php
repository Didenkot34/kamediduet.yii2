<?php

namespace app\modules\admin\models;

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
            [['id_categories'], 'integer','message'=>'Данное поле может принимать только целые числа'],
            [['discription', 'title','short_discription','id_categories'], 'required','message'=>'Вы не заполнили это поле'],
            [['discription'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['short_discription'], 'string', 'max' => 100],
            [['numbers_img'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_posts' => 'Id Posts',
            'id_categories' => 'Categories',
            'title' => 'Заголовок(Title)',
            'discription' => 'Описание (Discription)',
            'short_discription' => 'Краткое описание (Short Discription)',
            'numbers_img' => 'Номера Фотографий',
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
