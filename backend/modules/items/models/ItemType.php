<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class ItemType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [[ 'status','group'], 'integer'], 
            [[ 'name','group'], 'required'],
            
            [['name','note'], 'string', 'max' => 255],
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
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ItemTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemTypeQuery(get_called_class());
    }
}
