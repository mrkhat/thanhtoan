<?php

namespace backend\modules\users\models;

use Yii;

/**
 * This is the model class for table "user_types".
 *
 * @property integer $id
 * @property string $type
 * @property integer $status
 */
class UserTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'required'],
            [['status'], 'integer'],
            [['type'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTypesQuery(get_called_class());
    }
}
