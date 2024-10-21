<?php

namespace backend\modules\khth\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\khth\models\Luotkhamtrongngay;

/**
 * LuotkhamtrongngaySreach represents the model behind the search form about `backend\modules\khth\models\Luotkhamtrongngay`.
 */
class LuotkhamtrongngaySreach extends Luotkhamtrongngay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phongban_ID', 'opt'], 'integer'],
            [['ngaykham', 'total', 'created'], 'safe'],
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
        $query = Luotkhamtrongngay::find();

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
            'phongban_ID' => $this->phongban_ID,
            'ngaykham' => $this->ngaykham,
            'created' => $this->created,
            'opt' => $this->opt,
        ]);

        $query->andFilterWhere(['like', 'total', $this->total]);

        return $dataProvider;
    }
}
