<?php

namespace backend\modules\tscd\models;

use Yii;

/**
 * This is the model class for table "{{%taisancodinh}}".
 *
 * @property integer $id
 * @property string $display_date
 * @property string $location
 * @property string $nguoigiao
 * @property string $cv1
 * @property integer $room1
 * @property string $nguoinhan
 * @property string $cv2
 * @property string $room2
 * @property string $item
 * @property string $unit
 * @property integer $number
 * @property string $configuration
 * @property string $note
 */
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
class Tscd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taisancodinh}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display_date','devicekey'], 'safe'],
            [[ 'number','key'] ,'integer'],
            [['configuration', 'note'], 'string'],
             [['room1','location', 'nguoigiao', 'cv1',  'cv2', 'room2', 'item', 'unit','configuration','number'],  'required'],
            [['room1','location', 'nguoigiao', 'cv1', 'nguoinhan', 'cv2', 'room2', 'item', 'unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'key'),
            'display_date' => Yii::t('app', 'ngày giao'),
            'location' => Yii::t('app', 'Địa Điểm'),
            'nguoigiao' => Yii::t('app', 'Đại diện khoa phòng giao'),
            'cv1' => Yii::t('app', 'Chức Vụ'),
            'room1' => Yii::t('app', 'Khoa Phòng Giao'),
            'nguoinhan' => Yii::t('app', 'Đại diện khoa phòng nhận'),
            'cv2' => Yii::t('app', 'Chức Vụ'),
            'room2' => Yii::t('app', 'Khoa Phòng Nhận'),
            'item' => Yii::t('app', 'Thiết Bị'),
            'unit' => Yii::t('app', 'Đơn Vị Tính'),
            'number' => Yii::t('app', 'Số Lượng'),
            'configuration' => Yii::t('app', 'Cấu Hình'),
            'note' => Yii::t('app', 'Ghi Chú'),
            'devicekey' => Yii::t('app', 'Mã thiêt bị'),
        ];
    }

    /**
     * @inheritdoc
     * @return TaisancodinhQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaisancodinhQuery(get_called_class());
    }
       public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'key',
            
              ],
              'value' => function ($event) {
                    $key=$event->sender->key;
                      
                  if(!is_numeric($key)){
                   
                  $key= $this->find()->max('`key`')+1;
           
                  
                  }
              
                  return $key;
           
                   
                   
              },
          ],
    
             [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'display_date',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'display_date',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->display_date);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ],
                      
                       [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_UPDATE => 'devicekey',
                   ActiveRecord::EVENT_BEFORE_INSERT =>'devicekey',
             
              ],
              'value' => function ($event) {
           
                
                    return  json_encode($event->sender->devicekey);
              },
          ],    [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'devicekey',
             
              ],
              'value' => function ($event) {
           
                
                    return  json_decode($event->sender->devicekey);
              },
          ],
             [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'display_date',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->display_date);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],         
         
               
                      
      ];
  }
}
