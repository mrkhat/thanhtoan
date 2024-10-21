<?php

namespace backend\modules\dntt\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dntt_information".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_by
 * @property string $money
 * @property string $created
 * @property string $modified_by
 * @property string $attach
 * @property string $modified
 * @property string $proposal
 * @property string $note
 * @property string $date_of_payment
 * @property string $user
 */
class DnttInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dntt_information';
    }

    /**
     * @inheritdoc
     */
  public function rules()
    {
        return [
                  [['attach'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,pdf,doc,docx'],
            [['name','money','proposal' ], 'required'],
               [['money', ], 'integer'],
            [['name', 'created_by','modified_by', 'date_of_payment','proposal', 'note', 'attach', 'created','company'], 'string', 'max' => 255],
        ];
    }
 public static function primaryKey(){
    	return ['id'];
    }
    /**
     * @inheritdoc
     */
     public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nội Dung Thanh Toán',
            'user' => 'Người đề nghị',
            'money' => 'Số Tiền',
            'created' => 'created',
            'modified_by' => 'Modified By',
            'attach' => 'File Đính Kèm',
            'modified' => 'Modified',
            'proposal' => 'Tờ Trình',
            'company' => 'Công Ty',
            'date_of_payment'=>'Ngày Thanh Toán'
        ];
    }

    /**
     * @inheritdoc
     * @return DnttInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DnttInformationQuery(get_called_class());
    }
     public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'date_of_payment',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'date_of_payment',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->date_of_payment);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ], [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'date_of_payment',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->date_of_payment);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],
                      
            [
    					'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'created',
    					'updatedAtAttribute' => 'modified ',
    					'value' => new \yii\db\Expression('NOW()'),
    			],   [
              'class' => BlameableBehavior::className(),
              'createdByAttribute' => 'created_by',
             'updatedByAttribute' => 'modified_by',
          ],         
                      
      ];
  }
}
