<?php

namespace backend\modules\project\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property integer $customer_id
 * @property integer $money
 * @property string $guarantee
 * @property string $note
 * @property integer $status
 * @property string $attach
 * @property string $created
 */
class project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','customer_id' ], 'required'],
            [['customer_id', 'money', 'status'], 'integer'],
            [['guarantee', 'created'], 'safe'],
            [['name', 'note', 'attach'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Tên dự án'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'money' => Yii::t('app', 'Tổng Tiền'),
            'guarantee' => Yii::t('app', 'Ngày bảo hành'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'Hoàn thành'),
            'attach' => Yii::t('app', 'Attach'),
            'created' => Yii::t('app', 'Ngày tạo'),
        ];
    }
      public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
    public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'guarantee',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'guarantee',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->guarantee);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ], [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'guarantee',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->guarantee);;
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
          ]          
                      
      ];
  }
}
