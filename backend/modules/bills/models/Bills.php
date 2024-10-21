<?php

namespace backend\modules\bills\models;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "{{%bills}}".
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
 */
class Bills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bills}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'type', 'itemid', 'number', 'groupid', 'roomid',  'deliver',   'display_date', ], 'required'],
            [['key', 'type', 'itemid', 'number', 'groupid', 'roomid', 'status', 'status1', 'status2'], 'integer'],
            [['note','serial'], 'string'],
            [['created_date', 'display_date'], 'safe'],
            [['deliver', 'receiver', 'note2', 'source','hslienket'], 'string', 'max' => 255],
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
            
        ];
    }

    /**
     * @inheritdoc
     * @return BillsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BillsQuery(get_called_class());
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
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'key',
            
              ],
              'value' => function ($event) {
                    $key=$event->sender->key;
                      
                  if(!is_numeric($key)){
                   
                  $key= $this->find()->where(['`type`'=>$event->sender->type,'groupid'=>$event->sender->groupid])->max('`key`')+1;
           
                  
                  }
              
                  return $key;
           
                   
                   
              },
          ],
                       [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'created_date',
            
              ],
              'value' => function ($event) {
           
           
                   
                  return new \yii\db\Expression('NOW()');
              },
          ]
                      
      ];
  }
}
