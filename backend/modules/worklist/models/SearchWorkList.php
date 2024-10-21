<?php

namespace backend\modules\Worklist\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\worklist\models\WorklistInfomation;

/**
 * SearchWorkList represents the model behind the search form about `backend\modules\Worklist\models\WorkList`.
 */
class SearchWorkList extends WorklistInfomation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'note', 'first_name','status', 'created'], 'safe'],
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
        $query = WorklistInfomation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
               'pagination' => [
        		'pageSize' => 10 // in case you want a default pagesize
        	]
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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created', $this->created]) ->orderBy('id desc');;

        return $dataProvider;
    }
}
