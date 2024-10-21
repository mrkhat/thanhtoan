<?php

namespace backend\modules\khth\models;

use Yii;

/**
 * This is the model class for table "{{%test}}".
 *
 * @property integer $it
 * @property integer $column_1
 * @property integer $column_2
 * @property integer $column_3
 * @property integer $column_4
 * @property integer $column_5
 * @property integer $column_6
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['it'], 'required'],
            [['it', 'column_1', 'column_2', 'column_3', 'column_4', 'column_5', 'column_6'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'it' => Yii::t('app', 'It'),
            'column_1' => Yii::t('app', 'Column 1'),
            'column_2' => Yii::t('app', 'Column 2'),
            'column_3' => Yii::t('app', 'Column 3'),
            'column_4' => Yii::t('app', 'Column 4'),
            'column_5' => Yii::t('app', 'Column 5'),
            'column_6' => Yii::t('app', 'Column 6'),
        ];
    }
}
