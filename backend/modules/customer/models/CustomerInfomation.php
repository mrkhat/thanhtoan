<?php

namespace backend\modules\customer\models;
use yii\behaviors\AttributeBehavior;
use Yii;
use yii\db\ActiveRecord;
 
/**
 * This is the model class for table "customer_infomation".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property string $birthday
 * @property integer $activate
 * @property string $note
 * @property string $created
 * @property string $project_id
 */
class CustomerInfomation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_infomation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'activate'], 'integer'],
            [['birthday', 'created'], 'safe'],
            [['note', 'project_id'], 'string'],
            [['name', 'phone', 'address', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
     public static function primaryKey(){
    	return ['id'];
    }
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
            'project_id' => Yii::t('app', 'Dự Án'),
        ];
    }
     public function behaviors()
  {
      return [
          [
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
                      
                    
                      
      ];
  }
}
