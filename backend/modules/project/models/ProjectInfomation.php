<?php

namespace backend\modules\project\models;

use yii\behaviors\AttributeBehavior;
 
use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "project_infomation".
 *
 * @property integer $id
 * @property string $name
 * @property integer $customer_id
 * @property integer $money
 * @property string $guarantee
 * @property string $note
 * @property integer $status
 * @property string $attach
 * @property string $created
 * @property string $payment
 * @property string $recive
 */
class ProjectInfomation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_infomation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'money', 'status'], 'integer'],
            [['guarantee', 'created'], 'safe'],
            [['payment', 'recive'], 'number'],
            [['name', 'note', 'attach'], 'string', 'max' => 255],
        ];
    }
 public static function primaryKey(){
    	return ['id'];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên dự án'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'money' => Yii::t('app', 'Tổng Tiền'),
            'guarantee' => Yii::t('app', 'Ngày bảo hành'),
            'note' => Yii::t('app', 'Ghi chú'),
            'status' => Yii::t('app', 'Hoàn thành'),
            'attach' => Yii::t('app', 'Attach'),
            'created' => Yii::t('app', 'Ngày tạo'),
            'payment' => Yii::t('app', 'Tổng chi'),
            'recive' => Yii::t('app', 'Tổng thu'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProjectInfomationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectInfomationQuery(get_called_class());
    }
     public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'guarantee',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->guarantee);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],
           [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'created',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->created);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],
                      
                     
                      
      ];
  }
}
