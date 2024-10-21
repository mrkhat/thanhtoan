<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property string $item
 * @property string $unit
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'unit','type'], 'required'],
             [['type'], 'number', 'max' => 255],
            [['name', 'unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên Mặt Hàng'),
            'unit' => Yii::t('app', 'Đơn Vị Tính'),
            'type' => Yii::t('app', 'Nhóm thiêt bị'),
            'option' => Yii::t('app', 'Tài sản cố định'),
              'option2' => Yii::t('app', 'Thiết bị dự phòng'),
        
        ];
    }
}
