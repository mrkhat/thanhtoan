<?php

namespace backend\modules\gatepass\models;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%gatepass}}".
 *
 * @property integer $id
 * @property string $room
 * @property string $items
 * @property string $company
 * @property integer $number
 * @property string $unit
 * @property string $created_date
 * @property string $name
 */
class Gatepass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gatepass}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room', 'key','items', 'number', 'created_date', 'name'], 'required'],
            [['number'], 'integer'],
            [['created_date','devicekey', 'company', 'unit'], 'safe'],
            [['room', 'items', 'company', 'unit', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'room' => Yii::t('app', 'Khoa Phòng'),
            'items' => Yii::t('app', 'Items'),
            'company' => Yii::t('app', 'Công Ty'),
            'number' => Yii::t('app', 'Number'),
            'unit' => Yii::t('app', 'Unit'),
            'created_date' => Yii::t('app', 'Created Date'),
            'name' => Yii::t('app', 'Người làm phiếu'),
        ];
    }

    /**
     * @inheritdoc
     * @return GatepassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GatepassQuery(get_called_class());
    }
     public function behaviors()
  {
      return [
//           [
//              'class' => AttributeBehavior::className(),
//              'attributes' => [
//                  ActiveRecord::EVENT_BEFORE_INSERT => 'display_date',
//                 ActiveRecord::EVENT_BEFORE_UPDATE => 'display_date',
//              ],
//              'value' => function ($event) {
//           
//                $date=date_create_from_format("d/m/Y",$event->sender->display_date);
//                    if($date){
//                    return date_format($date,"Y/m/d");}
//              },
//          ],
//             [
//              'class' => AttributeBehavior::className(),
//              'attributes' => [
//                  ActiveRecord::EVENT_AFTER_FIND => 'display_date',
//              
//              ],
//              'value' => function ($event) {
//           
//                $date=date_create_from_format("Y-m-d",$event->sender->display_date);;
//                if($date){
//                  return date_format($date,"d/m/Y");}
//              },
//          ],         
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
