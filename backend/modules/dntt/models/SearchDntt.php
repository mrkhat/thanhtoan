<?php

namespace backend\modules\dntt\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\dntt\models\DnttInformation;

/**
 * SearchDntt represents the model behind the search form about `backend\modules\dntt\models\dntt`.
 */
class SearchDntt extends DnttInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money', ], 'integer'],
            [[ 'name','company','proposal'], 'safe'],
            [[ 'created',], 'safe'],
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
    public function search($params){
//    {$this->money=trim($this->money,",");
 
  if(isset($params['SearchDntt']['money'])){
 $params['SearchDntt']['money']=(str_replace(",","",$params['SearchDntt']['money']));
  }
        $query = DnttInformation::find();

        // add conditions that should always apply here

          $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
        		'pageSize' => 15 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
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
        $query->andFilterWhere([
            'id' => $this->id,
       
      
        ]);
      
    $date=explode("To",trim($this->date_of_payment));
        $datestart=null;
        $dateend=null;
        if(count($date)>1){
        $datestart=date_format(date_create_from_format("d/m/Y",trim($date[0])),"Y-m-d");
        $dateend=date_format(date_create_from_format("d/m/Y",trim($date[1])),"Y-m-d");}
  
        $query->andFilterWhere(['like', 'name', $this->name])
           ->andFilterWhere(['like', 'company', $this->company])
                ->andFilterWhere(['like', 'proposal', $this->proposal])
           ->andFilterWhere(['like', 'money', $this->money])
                
             ->andFilterWhere(['between', 'created', $datestart,$dateend]);

        return $dataProvider;
    }
}
