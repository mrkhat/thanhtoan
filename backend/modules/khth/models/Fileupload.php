<?php

namespace backend\modules\khth\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "{{%test}}".
 *
 * @property integer $it
 * @property integer $column_1
 * @property integer $column_2
 * @property integer $column_3
 * @property integer $column_4
 * @property integer $column_5
 * @property integer $column_6
 */
class Fileupload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
 
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt,xml'],
        ];
    }
    public function  getfile(){
        return  $this->imageFile;
    }
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

}
