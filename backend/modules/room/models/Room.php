<?php

namespace backend\modules\room\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property string $name
 * @property string $lever
 * @property integer $status
 * @property integer $note
 * @property string $suggest
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lever'], 'required'],
            [['status',], 'integer'],
            [['name', 'lever', 'note','suggest'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Khoa Phòng',
            'lever' => 'Tầng',
            'status' => 'Kích Hoạt',
            'note' => 'Ghi Chú',
            'suggest' => 'Gợi Ý',
        ];
    }
}
