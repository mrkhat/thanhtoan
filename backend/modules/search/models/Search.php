<?php

namespace backend\modules\search\models;

use Yii;

/**
 * This is the model class for table "search".
 *
 * @property integer $id
 * @property string $name
 * @property string $modul
 */
class Search extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search';
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
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['modul'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'modul' => Yii::t('app', 'Modul'),
        ];
    }

    /**
     * @inheritdoc
     * @return SearchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SearchQuery(get_called_class());
    }
}
