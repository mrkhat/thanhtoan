<?php

namespace backend\modules\payment\models;
use yii\behaviors\AttributeBehavior;
 
use yii\db\ActiveRecord;
use Yii;
/**
 * This is the model class for table "payment_information".
 *
 * @property integer $id
 * @property string $name
 * @property string $created_by
 * @property integer $money
 * @property string $users_id
 * @property string $receiver
 * @property string $project_id
 * @property string $note
 * @property string $attach
 * @property string $created
 * @property string $modified_by
 * @property string $first_name
 */
class PaymentInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_information';
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
            [['id', 'money'], 'integer'],
            [['note'], 'string'],
            [['created'], 'safe'],
            [['name', 'created_by', 'users_id', 'receiver', 'project_id', 'attach', 'modified_by'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Lý do chi'),
            'username' => Yii::t('app', 'Username'),
            'money' => Yii::t('app', 'Tổng tiền'),
            'deliver' => Yii::t('app', 'Người chi'),
            'receiver' => Yii::t('app', 'Người nhận'),
            'project_id' => Yii::t('app', 'Dự án'),
            'note' => Yii::t('app', 'Note'),
            'attach' => Yii::t('app', 'Attach'),
            'created' => Yii::t('app', 'Ngày chi'),
          
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
