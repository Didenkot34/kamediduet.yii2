<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg', 'maxFiles' => 20],
        ];
    }

    public function upload($path)
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . '/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}