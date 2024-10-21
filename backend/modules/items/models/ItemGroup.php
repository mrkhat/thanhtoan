<?php

namespace backend\modules\items\models;

use Yii;

/**
 * This is the model class for table "item_group".
 *
 * @property integer $id
 * @property string $name
 */
class ItemGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên nhóm'),
        ];
    }

    /**
     * @inheritdoc
     * @return ItemGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemGroupQuery(get_called_class());
    }
}
