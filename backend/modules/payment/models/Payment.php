<?php

namespace backend\modules\payment\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $money
 * @property string $deliver
 * @property string $receiver
 * @property string $project_id
 * @property string $note
 * @property string $attach
 * @property string $created
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
               [['attach'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,pdf,doc,docx'],
            [['name','deliver','money','receiver','project_id' ], 'required'],
               [['project_id', 'money', ], 'integer'],
            [['name', 'created_by','modified_by','deliver', 'receiver', 'project_id', 'note', 'attach', 'created'], 'string', 'max' => 255],
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
     * @return PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentQuery(get_called_class());
    }
       public static function thismonth(){
    $query= Payment::find();
    $query->select('sum(money) as money');
    $query->where('month(created) = month(CURRENT_DATE())');;
//   ->where(['MONTH(created)'=>' MONTH(CURRENT_DATE())'])->sum('money')
    $money=$query->createCommand()->queryOne();
  
    $money=is_null($money['money'])?'0':$money['money'];
    return $money;
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
                      
            [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'created',
            
              ],
              'value' => function ($event) {
           
           
                   
                  return new \yii\db\Expression('NOW()');
              },
          ] ,
                              [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'created',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->created);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ],   
                      
                      [
              'class' => BlameableBehavior::className(),
              'createdByAttribute' => 'created_by',
             'updatedByAttribute' => 'modified_by',
          ]         
                      
      ];
  }
    
}
