<?php

namespace backend\modules\bills\models;

use Yii;

/**
 * This is the model class for table "tonkho".
 *
 * @property integer $itemid
 * @property string $item
 * @property string $itemtype
 * @property string $nhap
 * @property string $xuat
 * @property string $ton
 */
class Tonkho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tonkho';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid'], 'required'],
            [['itemid'], 'integer'],
            [['nhap', 'xuat', 'ton'], 'number'],
            [['item', 'itemtype'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => Yii::t('app', 'Itemid'),
            'item' => Yii::t('app', 'Item'),
            'itemtype' => Yii::t('app', 'Itemtype'),
            'nhap' => Yii::t('app', 'Nhap'),
            'xuat' => Yii::t('app', 'Xuat'),
            'ton' => Yii::t('app', 'Ton'),
        ];
    }

    /**
     * @inheritdoc
     * @return TonkhoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TonkhoQuery(get_called_class());
    }
}
