<?php

namespace backend\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\project\models\ProjectInfomation;

/**
 * SearchProject represents the model behind the search form about `backend\modules\project\models\project`.
 */
class SearchProject extends ProjectInfomation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created'], 'safe'],
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
        $query = ProjectInfomation::find();

        // add conditions that should always apply here

         $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
        		'pageSize' => 10 // in case you want a default pagesize
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
             
            'status' => $this->status,
             
        ]);
 $date=explode("To",trim($this->created));
        $datestart=null;
        $dateend=null;
        if(count($date)>1){
        $datestart=date_format(date_create_from_format("d/m/Y",trim($date[0])),"Y-m-d");
        $dateend=date_format(date_create_from_format("d/m/Y",trim($date[1])),"Y-m-d");}
     
        $query->andFilterWhere(['like', 'name', $this->name])
         
            ->andFilterWhere(['between', 'created', $datestart,$dateend]);

        return $dataProvider;

        
    }
}
