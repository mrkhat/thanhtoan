<?php

namespace backend\modules\items\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\items\models\ItemInformation;

/**
 * SearchItemInformation represents the model behind the search form about `backend\modules\items\models\ItemInformation`.
 */
class SearchItems extends ItemInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'statust','group', 'type'], 'integer'],
            [['name', 'unit', 'typename'], 'safe'],
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
        $query = ItemInformation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
       'sort'=>[ 'defaultOrder' => [
            'id'=> SORT_DESC,
            
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
            'status' => $this->status,
            'statust' => $this->statust,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'unit', $this->unit])
                ->andFilterWhere(['=', 'group', $this->group])
            ->andFilterWhere(['like', 'typename', $this->typename]);

        return $dataProvider;
    }
}
