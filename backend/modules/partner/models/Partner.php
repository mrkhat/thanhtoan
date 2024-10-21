<?php

namespace backend\modules\partner\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $name
 * @property string $contact
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $discount
 * @property string $note
 * @property string $attach
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attach'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,pdf,doc,docx'],
            [['name',  'contact'], 'required'],
            [['phone'],'number'],
            [['email'],'email'],
            [['name', 'address','contact', 'position', 'phone','note', 'email', 'discount', 'attach'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên Đối Tác'),
            'contact' => Yii::t('app','Người Liên Hệ'),
            'position' => Yii::t('app', 'Chức Vụ'),
            'phone' => Yii::t('app', 'Điện Thoại'),
               'address' => Yii::t('app', 'Địa chỉ'),
            'email' => Yii::t('app', 'Email'),
            'discount' => Yii::t('app', 'Chiết Khấu'),
            'note' => Yii::t('app','Ghi Chú'),
            'attach' => Yii::t('app', 'Báo Giá'),
        ];
    }
}
