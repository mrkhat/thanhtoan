<?php

namespace backend\modules\repair_printer\models;

use Yii;

/**
 * This is the model class for table "printer".
 *
 * @property string $id
 * @property string $instore
 * @property string $key
 * @property string $MODEL
 * @property string $Giao
 * @property string $date
 * @property string $day_instort
 * @property string $room
 * @property string $trai
 * @property string $NOTE
 * @property string $Serrial
 * @property string $phanloai
 */
class Printer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'printer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'number'],
            [['Giao', 'date', 'day_instort'], 'safe'],
            [['instore', 'key', 'MODEL', 'room', 'trai', 'NOTE', 'Serrial', 'phanloai'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'instore' => Yii::t('app', 'Instore'),
            'key' => Yii::t('app', 'Key'),
            'MODEL' => Yii::t('app', 'Model'),
            'Giao' => Yii::t('app', 'Giao'),
            'date' => Yii::t('app', 'Date'),
            'day_instort' => Yii::t('app', 'Day Instort'),
            'room' => Yii::t('app', 'Room'),
            'trai' => Yii::t('app', 'Trai'),
            'NOTE' => Yii::t('app', 'Note'),
            'Serrial' => Yii::t('app', 'Serrial'),
            'phanloai' => Yii::t('app', 'Phanloai'),
        ];
    }

    /**
     * @inheritdoc
     * @return PrinterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrinterQuery(get_called_class());
    }
}
