<?php
namespace app\models;

use app\Traits\Path;
use yii\base\Model;
use yii\base\Theme;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    use Path;
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,JPG,png,jpeg', 'maxFiles' => 20],
        ];
    }

    public function upload($path, $model, $property)
    {
        $img_name = '';

        if ($this->validate()) {
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            if ($property === 'categories_img' && isset($model->$property)) {
                chmod($path . '/' .  $model->$property,0777);
                unlink($path . '/' .  $model->$property);
                $model->$property = '';
                $model->save();
            }
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . '/' . $file->name);
                $img_name .= ',' . $file->name;
            }

            $model->$property .= $img_name;
            $model->$property = trim(preg_replace('/^,/', '', $model->$property));
            $model->save();
            return true;
        } else {
            return false;
        }
    }
}