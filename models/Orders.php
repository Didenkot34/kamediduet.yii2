<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id_order
 * @property string $categories
 * @property string $name
 * @property string $tel
 * @property string $date
 * @property string $time_event
 * @property string $subject
 * @property string $created_at
 * @property string $email
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['time_event', 'created_at'], 'safe'],
            [['subject'], 'string'],
            [['categories', 'tel'], 'string', 'max' => 15],
            [['name', 'email'], 'string', 'max' => 55],
            [['date'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'categories' => 'Categories',
            'name' => 'Name',
            'tel' => 'Tel',
            'date' => 'Date',
            'time_event' => 'Time Event',
            'subject' => 'Subject',
            'created_at' => 'Created At',
            'email' => 'Email',
        ];
    }
}
