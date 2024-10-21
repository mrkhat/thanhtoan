<?php

namespace backend\modules\worklist\models;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "work_list".
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property string $note
 * @property string $status
 * @property string $created
 */
class WorkList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['created'], 'safe'],
           [['attach'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,pdf,doc,docx'],
           [['name','user_id'], 'required'],
           [['urgent','status'],'integer'],
		[['note'],'string'],
           [['name', 'attach'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên công việc',
            'user_id' => 'Người chỉ định',
            'note' => 'Ghi chú',
            'status' => 'Đã hoàn thành',
            'created' => 'Ngày tạo',
            'urgent'=>'Gấp',
            'attach'=>'File đính kèm'
        ];
    }

    /**
     * @inheritdoc
     * @return WorkListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkListQuery(get_called_class());
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
          ],
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
                      
      ];
  }
}
