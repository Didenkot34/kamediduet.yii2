<?php

namespace app\models;

use app\Traits\Path;
use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id_posts
 * @property integer $id_categories
 * @property string $title
 * @property string $discription
 * @property string $short_discription
 * @property string $posts_img
 *
 * @property Comments[] $comments
 * @property Categories $idCategories
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    use Path;
    public $checkbox = [];

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
            [['id_categories'], 'integer', 'message' => 'Данное поле может принимать только целые числа'],
            [['discription', 'title', 'short_discription', 'id_categories'], 'required', 'message' => 'Вы не заполнили это поле'],
            [['discription'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['short_discription'], 'string', 'max' => 100],
            [['posts_img'], 'string']
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
            'posts_img' => 'Номера Фотографий',
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

    public static function getAllPosts($id)
    {
        return self::find()
            ->where(['id_categories' => $id])
            ->orderBy('id_posts')
            ->all();
    }

    public static function exceptCurrentPost($id_categories, $id_post)
    {
        self::find()
            ->where(['id_categories' => $id_categories])
            ->andWhere(['!=', 'id_posts', $id_post])
            ->orderBy('id_posts')
            ->all();
    }

    public function getNameCategory($id)
    {
        return Categories::findOne(['id_categories' => $id])->title;
    }

    public function deletePhotos($id, $deleteImg)
    {
        $model = $this->findOne($id);
        $allImg = $this->getArrayAllImg($id);
        $saveImg = array_diff($allImg, $deleteImg);
        $deleteImg = array_diff($deleteImg, array_diff($deleteImg, $allImg));

        foreach ($deleteImg as $val) {
            if ($val) {
                unlink($this->getPostPath($model->id_categories, $model->id_posts) . '/' . $val);
            }
        }
        $model->posts_img = '';
        $model->save();
        $model->posts_img .= implode(',', $saveImg);
        $model->posts_img = trim(preg_replace('/^,/', '', $model->posts_img));
        $model->save();
    }

    public function getArrayAllImg($id)
    {
        return explode(',', $this->findOne($id)->posts_img);
    }

}
