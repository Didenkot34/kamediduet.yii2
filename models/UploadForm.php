<?php
namespace app\models;

use app\Traits\Path;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

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
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,JPG,png', 'maxFiles' => 20],
        ];
    }

    public function upload($path, $model)
    {
        $img_name = '';

        if ($this->validate()) {
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            foreach ($this->imageFiles as $file) {
                $file->saveAs($path . '/' . $file->name);
                $img_name .= ',' . $file->name;
            }
            $model->numbers_img .= $img_name;
            $model->numbers_img = trim(preg_replace('/^,/', '', $model->numbers_img));
            $model->save();
            return true;
        } else {
            return false;
        }
    }
}