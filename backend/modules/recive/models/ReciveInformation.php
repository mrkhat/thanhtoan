<?php

namespace backend\modules\recive\models;
 
use yii\behaviors\AttributeBehavior;
 
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "recive_information".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_by
 * @property integer $money
 * @property string $deliver
 * @property string $users_id
 * @property integer $project_id
 * @property string $note
 * @property string $created
 * @property string $attach
 * @property string $step
 * @property string $modified_by
 * @property string $receiver
 * @property string $project
 */
class ReciveInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recive_information';
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
            [['id', 'money', 'project_id'], 'integer'],
            [['created'], 'safe'],
            [['name', 'created_by', 'deliver', 'users_id', 'note', 'attach', 'step', 'modified_by', 'project'], 'string', 'max' => 255],
            [['receiver'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Lý do thu'),
            'username' => Yii::t('app', 'Username'),
            'money' => Yii::t('app', 'Tổng số tiền'),
            'deliver' => Yii::t('app', 'Người đưa'),
            'receiver' => Yii::t('app', 'Người nhận'),
            'project_id' => Yii::t('app', 'Project ID'),
            'note' => Yii::t('app', 'Note'),
            'created' => Yii::t('app', 'Ngày thu'),
            'attach' => Yii::t('app', 'Attach'),
            'step' => Yii::t('app', 'Giai đoạn'),
//            'id' => Yii::t('app', 'ID'),
//            'name' => Yii::t('app', 'Name'),
//            'created_by' => Yii::t('app', 'Created By'),
//            'money' => Yii::t('app', 'Money'),
//            'deliver' => Yii::t('app', 'Deliver'),
//            'users_id' => Yii::t('app', 'Users ID'),
//            'project_id' => Yii::t('app', 'Project ID'),
//            'note' => Yii::t('app', 'Note'),
//            'created' => Yii::t('app', 'Created'),
//            'attach' => Yii::t('app', 'Attach'),
//            'step' => Yii::t('app', 'Step'),
//            'modified_by' => Yii::t('app', 'Modified By'),
//            'receiver' => Yii::t('app', 'Receiver'),
//            'project' => Yii::t('app', 'Project'),
        ];
    }

    /**
     * @inheritdoc
     * @return ReciveInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReciveInformationQuery(get_called_class());
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
