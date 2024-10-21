<?php

namespace backend\modules\customer\models;
use yii\behaviors\AttributeBehavior;
use Yii;
use yii\db\ActiveRecord;
 
/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $birthday
 * @property integer $activate
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday','created'], 'safe'],
            [['activate'], 'integer'],
            [['name', ], 'required'],
            [['phone'],'number'],
            [['email'],'email'],
            [['name', 'phone', 'address', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên Khách Hàng'),
            'phone' => Yii::t('app', 'Điện Thoại'),
            'address' => Yii::t('app', 'Địa Chỉ'),
            'email' => Yii::t('app', 'Email'),
            'birthday' => Yii::t('app', 'Ngày Sinh'),
            'created' => Yii::t('app', 'Ngày Tạo'),
            'activate' => Yii::t('app', 'Kích Hoạt'),
        ];
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
   public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'birthday',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'birthday',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->birthday);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ], [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'birthday',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->birthday);
                if($date){
                  return date_format($date,"d/m/Y");
                  
                }  else {
                return "";    
                }
              },
          ],
                      
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'created',
            
              ],
              'value' => function ($event) {
           
           
                   
                  return new \yii\db\Expression('NOW()');
              },
          ]          
                      
      ];
  }
}
