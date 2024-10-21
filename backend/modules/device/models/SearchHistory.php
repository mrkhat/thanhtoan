<?php

namespace backend\modules\device\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\device\models\DeviceHistory;

/**
 * SearchHistory represents the model behind the search form about `backend\modules\device\models\DeviceLocation`.
 */
class SearchHistory extends DeviceHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['key', 'group'], 'integer'],
           
            [['item', 'note', 'room','note','date','name'], 'safe'],
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
        $query = DeviceHistory::find()->orderBy(['date'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
         
       
            
            'date' => $this->date,
        ]);

            $query->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'note', $this->note])
             ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
