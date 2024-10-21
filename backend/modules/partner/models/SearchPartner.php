<?php

namespace backend\modules\partner\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\partner\models\Partner;

/**
 * SearchPartner represents the model behind the search form about `backend\modules\partner\models\partner`.
 */
class SearchPartner extends partner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'contact', 'position', 'phone', 'email', 'discount', 'note', 'attach'], 'safe'],
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
        $query = Partner::find();

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
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'attach', $this->attach]);

        return $dataProvider;
    }
}
