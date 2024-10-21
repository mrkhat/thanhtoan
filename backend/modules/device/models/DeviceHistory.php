<?php

namespace backend\modules\device\models;

use Yii;

/**
 * This is the model class for table "device_history".
 *
 * @property string $name
 * @property integer $key
 * @property string $item
 * @property string $note
 * @property string $date
 * @property string $room
 * @property string $group
 */
class DeviceHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'group'], 'integer'],
            [['item', 'note', 'room'], 'string'],
            [['note'], 'required'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 266],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'key' => Yii::t('app', 'Key'),
            'item' => Yii::t('app', 'Item'),
            'note' => Yii::t('app', 'Note'),
            'date' => Yii::t('app', 'Date'),
            'room' => Yii::t('app', 'Room'),
            'group' => Yii::t('app', 'Group'),
        ];
    }

    /**
     * @inheritdoc
     * @return DeviceHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceHistoryQuery(get_called_class());
    }
}
