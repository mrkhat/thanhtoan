<?php

namespace backend\modules\device\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "device_location".
 *
 * @property integer $id
 * @property string $lever
 * @property string $departments
 * @property string $user
 * @property string $room_name
 * @property string $room_number
 * @property string $note
 * @property integer $device_id
 * @property string $created
 * @property string $created_by
 * @property string $modified_by
 * @property string $date
 */
class DeviceLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lever','device_id'], 'required'],
            [['device_id', 'departments_id',], 'integer'],
            [['created', 'date'], 'safe'],
            [['lever', 'user', 'room_name', 'room_number', 'note', 'created_by', 'modified_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lever' => 'Lever',

            'user' => 'User',
            'room_name' => 'Room Name',
            'room_number' => 'Room Number',
            'note' => 'Note',
            'device_id' => 'Device ID',
            'created' => 'Created',
            'created_by' => 'Created By',
            'modified_by' => 'Modified By',
            'date' => 'Date',
        ];
    }
    public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'date',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'date',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->date);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ], [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'date',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->date);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],
                      
            [
    					'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'created',
    					'updatedAtAttribute' => 'modified',
    					'value' => new \yii\db\Expression('NOW()'),
    			],   
    			[
              'class' => BlameableBehavior::className(),
              'createdByAttribute' => 'created_by',
             'updatedByAttribute' => 'modified_by',
          ],         
                      
      ];
  }
}
