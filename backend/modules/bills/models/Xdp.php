<?php

namespace backend\modules\bills\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "xdp".
 *
 * @property integer $id
 * @property integer $key
 * @property integer $type
 * @property integer $itemid
 * @property integer $number
 * @property integer $groupid
 * @property integer $roomid
 * @property string $note
 * @property string $deliver
 * @property string $receiver
 * @property string $created_date
 * @property string $display_date
 * @property integer $status
 * @property integer $status1
 * @property integer $status2
 * @property string $note2
 * @property string $source
 * @property string $roomname
 * @property string $item
 * @property string $unit
 * @property string $groupname
 * @property string $serial
 * @property string $price
 * @property string $itemtype
 * @property string $devicekey
 * @property integer $itop2
 * @property integer $itop1
 */
class Xdp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xdp';
    }
 public static function primaryKey(){
    	return ['id'];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'key', 'type', 'itemid', 'number', 'groupid', 'roomid', 'status', 'status1', 'status2', 'itop2', 'itop1'], 'integer'],
            [['key', 'type', 'itemid', 'number', 'groupid', 'roomid', 'note', 'deliver', 'receiver', 'created_date', 'status', 'note2'], 'required'],
            [['note'], 'string'],
            [['created_date', 'display_date'], 'safe'],
            [['price'], 'number'],
            [['deliver', 'receiver', 'note2', 'source', 'roomname', 'item', 'unit', 'groupname', 'serial', 'itemtype', 'devicekey'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                 'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Key'),
            'type' => Yii::t('app', 'Loại Phiếu'),
            'itemid' => Yii::t('app', 'Thiết Bị'),
            'number' => Yii::t('app', 'SL'),
            'groupid' => Yii::t('app', 'Groupid'),
            'roomid' => Yii::t('app', 'Khoa/Phòng'),
            'note' => Yii::t('app', 'Ghi Chú'),
            'deliver' => Yii::t('app', 'Người Giao'),
            'serial' => Yii::t('app', 'serial'),
          
            'receiver' => Yii::t('app', 'Người nhận'),
            'created_date' => Yii::t('app', 'Ngày Tạo'),
            'display_date' => Yii::t('app', 'Ngày Giao'),
            'status' => Yii::t('app', 'Tình Trạng'),
            'status1' => Yii::t('app', 'Status1'),
            'status2' => Yii::t('app', 'Status2'),
            'note2' => Yii::t('app', 'Ghi Chú'),
            'source' => Yii::t('app', 'nguồn'),
            'roomname' => Yii::t('app', 'Tên Phòng'),
            'item' => Yii::t('app', 'Thiết Bị'),
            'unit' => Yii::t('app', 'Đơn Vị'),
            'groupname' => Yii::t('app', 'Groupname'),
            'itop2' => Yii::t('app', 'op=1 nguon thiet bi du phong'),
            'itop1' => Yii::t('app', 'op=1 tai san co dinh'),
        ];
    }

    /**
     * @inheritdoc
     * @return XdpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new XdpQuery(get_called_class());
    }
               public function behaviors()
  {
      return [
    
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
