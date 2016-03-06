<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id_categories
 * @property string $title
 * @property string $discription
 * @property string $categories_img
 *
 * @property Posts[] $posts
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','discription'], 'required','message'=>'Вы не заполнили это поле'],
            [['title'], 'string', 'max' => 50],
            [['discription'], 'string', 'max' => 600],
            [['categories_img'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categories' => 'Id Categories',
            'title' => 'Title',
            'discription' => 'Discription',
            'categories_img' => 'Img'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['id_categories' => 'id_categories']);
    }
}
