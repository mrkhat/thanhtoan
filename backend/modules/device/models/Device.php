<?php

namespace backend\modules\device\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property integer $id
 * @property string $type
 * @property string $key
 * @property string $model
 * @property string $serrial
 * @property string $note
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
    
            [['type', 'key'], 'unique','targetAttribute' => ['type', 'key'],],
            [['type', 'key','nhacungcap', 'model', ], 'required'],
            [['note','configuration'], 'string'],
            [['price', ], 'integer'],
            [['type', 'key', 'model', 'serrial','nhacungcap'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'key' => 'Key',
            'model' => 'Model',
            'serrial' => 'Serrial',
            'configuration'=>'configuration',
            'note' => 'Note',
            'price'=>'Price',
            'nhacungcap'=>'Nhà Cung Cấp'
        ];
    }

    /**
     * @inheritdoc
     * @return DeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceQuery(get_called_class());
    }
}
