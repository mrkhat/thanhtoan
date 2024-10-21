<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_information".
 *
 * @property integer $id
 * @property string $name
 * @property string $unit
 * @property integer $status
 * @property string $typename
 * @property integer $statust
 * @property integer $type
 * @property integer $group
 * @property string $groupname
 */
class ItemInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status',  'option', 'option2','statust', 'type', 'group'], 'integer'],
            [['name', 'unit'], 'required'],
            [['name', 'unit', 'typename', 'groupname'], 'string', 'max' => 255],
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên'),
            'unit' => Yii::t('app', 'Đơn vị tính'),
            'status' => Yii::t('app', 'Tình trạng'),
            'typename' => Yii::t('app', 'Loại'),
            'statust' => Yii::t('app', 'Statust'),
            'type' => Yii::t('app', 'Type'),
            'group' => Yii::t('app', 'Group'),
            'groupname' => Yii::t('app', 'Nhóm'),
              'option' => Yii::t('app', 'Tài sản cố định'),
              'option2' => Yii::t('app', 'Thiết bị dự phòng'),
        ];
    }

    /**
     * @inheritdoc
     * @return ItemInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemInformationQuery(get_called_class());
    }
}
