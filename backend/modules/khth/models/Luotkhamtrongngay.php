<?php

namespace backend\modules\khth\models;

use Yii;

/**
 * This is the model class for table "luotkhamtrongngay".
 *
 * @property integer $id
 * @property integer $phongban_ID
 * @property string $ngaykham
 * @property string $total
 * @property string $created
 * @property integer $opt
 */
class Luotkhamtrongngay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'luotkhamtrongngay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phongban_ID', 'opt'], 'integer'],
            [['ngaykham', 'created'], 'safe'],
            [['total'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phongban_ID' => Yii::t('app', 'Phongban  ID'),
            'ngaykham' => Yii::t('app', 'Ngaykham'),
            'total' => Yii::t('app', 'Total'),
            'created' => Yii::t('app', 'Created'),
            'opt' => Yii::t('app', 'Opt'),
        ];
    }

    /**
     * @inheritdoc
     * @return LuotkhamtrongngayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LuotkhamtrongngayQuery(get_called_class());
    }
}
