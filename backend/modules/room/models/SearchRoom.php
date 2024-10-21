<?php

namespace backend\modules\room\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\room\models\Room;

/**
 * SearchRoom represents the model behind the search form about `backend\modules\room\models\Room`.
 */
class SearchRoom extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'note'], 'integer'],
            [['name', 'lever', 'suggest'], 'safe'],
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
        $query = Room::find();

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
            'id' => $this->id,
            'status' => $this->status,
            'note' => $this->note,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lever', $this->lever])
            ->andFilterWhere(['like', 'suggest', $this->suggest]);

        return $dataProvider;
    }
}
