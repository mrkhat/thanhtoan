<?php

namespace backend\modules\gatepass\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\gatepass\models\Gatepass;

/**
 * SearchGatepass represents the model behind the search form about `backend\modules\gatepass\models\Gatepass`.
 */
class SearchGatepass extends Gatepass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number'], 'integer'],
            [['room', 'items', 'company', 'unit', 'created_date', 'name'], 'safe'],
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
        $query = Gatepass::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
                     'query' => $query,
                 
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],
                'sort'=>[ 'defaultOrder' => [
            'id' => SORT_DESC,
            
        ]]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
         $date=explode("To",trim($this->created_date));
        $datestart=null;
        $dateend=null;
        if(count($date)>1){
        $datestart=date_format(date_create_from_format("d/m/Y",trim($date[0])),"Y-m-d");
        $dateend=date_format(date_create_from_format("d/m/Y",trim($date[1])),"Y-m-d");}
  
      
        $query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
        
        ]);

        $query->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'items', $this->items])
            
          
            ->andFilterWhere(['like', 'name', $this->name])
          ->andFilterWhere(['between', 'date_of_payment', $datestart,$dateend]);

        return $dataProvider;
    }
}
