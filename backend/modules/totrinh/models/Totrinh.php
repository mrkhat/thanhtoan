<?php

namespace backend\modules\totrinh\models;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "totrinh".
 *
 * @property integer $id
 * @property string $number
 * @property string $title
 * @property string $note
 * @property string $created_by
 * @property string $created
 * @property string $modified_by
 * @property string $modified
 * @property string $date_display
 */
class Totrinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'totrinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'note'], 'string'],
            [['number'], 'number','max'=>9999],
            [['title','number','date_display' ], 'required'],
            [['created', 'modified', 'date_display','year'], 'safe'],
            [[ 'created_by', 'modified_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Number'),
            'title' => Yii::t('app', 'Title'),
            'note' => Yii::t('app', 'Note'),
            'created_by' => Yii::t('app', 'Created By'),
            'created' => Yii::t('app', 'Created'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'modified' => Yii::t('app', 'Modified'),
            'date_display' => Yii::t('app', 'Date Display'),
        ];
    }
      public function behaviors()
  {
      return [
          [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                 ActiveRecord::EVENT_BEFORE_INSERT => 'date_display',
                 ActiveRecord::EVENT_BEFORE_UPDATE => 'date_display',
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("d/m/Y",$event->sender->date_display);
                    if($date){
                    return date_format($date,"Y/m/d");}
              },
          ],
                   
        
        [
              'class' => AttributeBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_AFTER_FIND => 'date_display',
              
              ],
              'value' => function ($event) {
           
                $date=date_create_from_format("Y-m-d",$event->sender->date_display);;
                if($date){
                  return date_format($date,"d/m/Y");}
              },
          ],
                      
            [				'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'created',
    					'updatedAtAttribute' => 'modified',
    					'value' => new \yii\db\Expression('NOW()'),
    			],  
                      [			'class' => TimestampBehavior::className(),
    					'createdAtAttribute' => 'year',
    					 'updatedAtAttribute'=> 'year',
    					'value' =>  function ($event) {
           
                $date=date_create_from_format("Y/m/d",$event->sender->date_display);;
//                 var_dump(date$event->sender->date_display);exit;
                if($date){
                   
                  return date_format($date,"Y");}
              },
    			],
    			[
              'class' => BlameableBehavior::className(),
             'createdByAttribute' => 'created_by',
             'updatedByAttribute' => 'modified_by',
          ],         
                      
      ];
  }
}
