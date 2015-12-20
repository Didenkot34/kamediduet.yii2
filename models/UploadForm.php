<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,JPG,png', 'maxFiles' => 20],
        ];
    }

    public function upload($path, $model)
    {
        if ($this->validate()) {
            $data = ArrayHelper::toArray($this->imageFiles);
            $img_column = array_column($data, 'name');
            $img_name = '';
            foreach ($img_column as $name) {
                $img_name .= ',' . $name;
            }

            $model->numbers_img .= $img_name;
            $model->numbers_img = trim(preg_replace('/^,/', '', $model->numbers_img));
            //$model->numbers_img = trim(preg_replace('/,/', ',<br>', $model->numbers_img));
            $model->save();
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . '/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}