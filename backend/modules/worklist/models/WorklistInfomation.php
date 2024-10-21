<?php

namespace backend\modules\worklist\models;

use Yii;
use yii\behaviors\AttributeBehavior;
 
use yii\db\ActiveRecord;
 
/**
 * This is the model class for table "worklist_infomation".
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property string $note
 * @property string $status
 * @property string $created
 * @property string $first_name
 */
class WorklistInfomation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worklist_infomation';
    }

    /**
     * @inheritdoc
     */
     public static function primaryKey(){
    	return ['id'];
    }
    public function rules()
    {
        return [
            [['id','urgent', 'user_id'], 'integer'],
            [['created'], 'safe'],
            [['name', 'note', 'status','attach'], 'string', 'max' => 255],
            [['first_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên công việc'),
            'user_id' => Yii::t('app', 'User ID'),
            'note' => Yii::t('app', 'Ghi chú'),
            'status' => Yii::t('app', 'Hoàn thành'),
            'created' => Yii::t('app', 'Ngày tạo'),
            'attach' => Yii::t('app', 'File đính kèm'),
            'first_name' => Yii::t('app', 'Người giao'),
            'urgent'=>'Gấp'
        ];
    }

    /**
     * @inheritdoc
     * @return WorklistInfomationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorklistInfomationQuery(get_called_class());
    }
         public function behaviors()
  {
      return [
          
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
