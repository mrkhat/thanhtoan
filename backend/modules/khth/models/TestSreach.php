<?php

namespace backend\modules\khth\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\khth\models\Test;

/**
 * TestSreach represents the model behind the search form about `backend\modules\khth\models\Test`.
 */
class TestSreach extends Test
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['it', 'column_1', 'column_2', 'column_3', 'column_4', 'column_5', 'column_6'], 'integer'],
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
        $query = Test::find();

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
            'it' => $this->it,
            'column_1' => $this->column_1,
            'column_2' => $this->column_2,
            'column_3' => $this->column_3,
            'column_4' => $this->column_4,
            'column_5' => $this->column_5,
            'column_6' => $this->column_6,
        ]);

        return $dataProvider;
    }
}
