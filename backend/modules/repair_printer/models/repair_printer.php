<?php

namespace backend\modules\repair_printer\models;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "repair_printer".
 *
 * @property integer $ID
 * @property string $maphieu
 * @property string $Ngay
 * @property string $loaimay
 * @property string $noidungsuachua
 * @property string $mathietbi
 * @property string $serrial
 * @property string $SL
 * @property string $room
 * @property string $note
 */
class repair_printer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repair_printer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ngay'], 'safe'],
            [['maphieu', 'loaimay', 'noidungsuachua', 'printerkey', 'serrial', 'SL', 'room','roomid', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'maphieu' => Yii::t('app', 'Maphieu'),
            'Ngay' => Yii::t('app', 'Ngay'),
            'loaimay' => Yii::t('app', 'Thiết Bị'),
            'noidungsuachua' => Yii::t('app', 'Nội Dung Sửa Chữa'),
            'printerkey' => Yii::t('app', 'printerkey'),
            'serrial' => Yii::t('app', 'Serrial'),
            'SL' => Yii::t('app', 'Sl'),
            'room' => Yii::t('app', 'Khoa/Phòng'),
            'note' => Yii::t('app', 'Note'),
        ];
    }

    /**
     * @inheritdoc
     * @return RepairPrinterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RepairPrinterQuery(get_called_class());
    }
     public function behaviors()
  {
      return [
    
             [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'Ngay',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'Ngay',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->Ngay);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ],
                         [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'Ngay',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->Ngay);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],  
                      
//                       [
//              'class' => AttributeBehavior::className(),
//              'attributes' => [
//                  ActiveRecord::EVENT_BEFORE_UPDATE => 'printerkey',
//             
//              ],
//              'value' => function ($event) {
//           
//                
//                    return  json_encode($event->sender->printerkey);
//              },
//          ],  
//                          [
//              'class' => AttributeBehavior::className(),
//              'attributes' => [
//                  ActiveRecord::EVENT_AFTER_FIND => 'printerkey',
//             
//              ],
//              'value' => function ($event) {
//           
//                
//                    return  json_decode($event->sender->printerkey);
//              },
//          ],
//             [
//              'class' => AttributeBehavior::className(),
//              'attributes' => [
//                  ActiveRecord::EVENT_AFTER_FIND => 'Ngay',
//              
//              ],
//              'value' => function ($event) {
//           
//                $date=date_create_from_format("Y-m-d",$event->sender->Ngay);;
//                if($date){
//                  return date_format($date,"d/m/Y");}
//              },
//          ],         
         
               
                      
      ];
  }
}
