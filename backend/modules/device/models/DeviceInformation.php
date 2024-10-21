<?php

namespace backend\modules\device\models;

use Yii;

/**
 * This is the model class for table "device_information".
 *
 * @property integer $id
 * @property string $type
 * @property string $key
 * @property string $model
 * @property string $serrial
 * @property string $note
 * @property string $lever
 * @property string $departments
 * @property string $user
 * @property string $room_name
 * @property string $room_number
 * @property string $location_note
 * @property string $created
 * @property string $created_by
 * @property string $modified_by
 * @property string $date
 */
class DeviceInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'key', 'model',  'note'], 'required'],
            [['note'], 'string'],
            [['created', 'date'], 'safe'],
            [['type', 'key', 'model', 'serrial', 'lever', 'departments', 'user', 'room_name', 'room_number', 'location_note', 'created_by', 'modified_by'], 'string', 'max' => 255],
        ];
    }
 public static function primaryKey(){
    	return ['id'];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name'=>'Mã Thiết Bị',
            'key' => 'Key',
            'model' => 'Model',
            'serrial' => 'Serrial',
            'note' => 'Ghi Chú Thiết Bị',
            'lever' => 'Tầng',
            'departments' => 'Khoa Phòng',
            'user' => 'User',
            'room_name' => 'Phòng',
            'room_number' => 'Số Phòng',
            'location_note' => 'Ghi Chú Khoa/Phòng',
            'created' => 'Created',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'date' => 'Date',
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
