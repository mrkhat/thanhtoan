<?php

namespace backend\modules\printer\models;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use \backend\modules\room\models\Room;
use Yii;

/**
 * This is the model class for table "printer".
 *
 * @property integer $id
 * @property string $instore
 * @property string $key
 * @property string $model
 * @property integer $price
 * @property string $day_delivery
 * @property string $day_manufacture
 * @property string $day_instore
 * @property string $room
 * @property string $note2
 * @property string $note
 * @property string $serrial
 * @property string $type
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
            [['key'], 'required'],
            [['price','departments_id'], 'integer'],
            [['day_delivery', 'day_manufacture', 'day_instore'], 'safe'],
            [['instore', 'key', 'model','company',  'note2', 'note', 'serrial', 'type'], 'string', 'max' => 255],
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
            'model' => Yii::t('app', 'Model'),
            'price' => Yii::t('app', 'Price'),
            'day_delivery' => Yii::t('app', 'Day Delivery'),
            'day_manufacture' => Yii::t('app', 'Day Manufacture'),
            'day_instore' => Yii::t('app', 'Day Instore'),
//            'room' => Yii::t('app', 'Room'),
            'note2' => Yii::t('app', 'Note2'),
            'note' => Yii::t('app', 'Note'),
            'serrial' => Yii::t('app', 'Serrial'),
            'type' => Yii::t('app', 'Type'),
             'company' => Yii::t('app', 'company'),
             'roomName' => Yii::t('app', 'name'),
            
        ];
    }
    public function getRoom() {
   
        return $this->hasOne(Room::className(), ['id' => 'departments_id']);

 
}

/* Getter for country name */
public function getRoomName() {
    
    return is_null($this->room)?NULL:$this->room->name;
}
         public function behaviors()
  {
      return [
    
             [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'day_delivery',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'day_delivery',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->day_delivery);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ],
                      
                        
             [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'day_delivery',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->day_delivery);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],         
         
               
                      
      ];
  }
}
