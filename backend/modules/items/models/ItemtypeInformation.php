<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "itemtype_information".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $note
 * @property integer $group
 * @property string $groupname
 */
class ItemtypeInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'itemtype_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'group'], 'integer'],
            [['note'], 'string'],
            [['name', 'groupname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên'),
            'status' => Yii::t('app', 'Tình Trạng'),
            'note' => Yii::t('app', 'Ghi Chú'),
            'group' => Yii::t('app', 'Nhóm'),
            'groupname' => Yii::t('app', 'Tên Nhóm'),
          
        ];
    }

    /**
     * @inheritdoc
     * @return ItemtypeInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemtypeInformationQuery(get_called_class());
    }
}
