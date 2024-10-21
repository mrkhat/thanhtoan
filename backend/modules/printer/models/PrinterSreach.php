<?php

namespace backend\modules\printer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\printer\models\printer;

/**
 * PrinterSreach represents the model behind the search form about `backend\modules\printer\models\printer`.
 */
class PrinterSreach extends printer
{
    /**
     * @inheritdoc
     */
     public $roomName;
//    public function attributes()
//{
//       
//    // add related fields to searchable attributes
//    return array_merge(parent::attributes(), ['room_name']);
//}
    public function rules()
    {
        return [
            [['id', 'price','departments_id'], 'integer'],
            [['instore',  'key', 'model','company', 'day_delivery', 'day_manufacture', 'day_instore', 'room', 'note2', 'note', 'serrial', 'type'], 'safe'],
            [['roomName'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = printer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
                 'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
            
        ]]
        ]);

//       $query->joinWith(['room']);
//       var_dump($params);exit;
        $this->load($params);
 
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
// exit;
        // grid filtering conditions
        $query->andFilterWhere([
//            'id' => $this->id,
//            'price' => $this->price,
//            'day_delivery' => $this->day_delivery,
//            'day_manufacture' => $this->day_manufacture,
//            'day_instore' => $this->day_instore,
           'departments_id' => $this->departments_id,
        ]);
//
        $query->andFilterWhere(['like', 'instore', $this->instore])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'model', $this->model])
//            ->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'serrial', $this->serrial])
            ->andFilterWhere(['like', 'type', $this->type]);
//$query->andFilterWhere([
//    'like',
//    'room.name',
//     $this->getAttribute('name')
//]);
        return $dataProvider;
    }
 

}
