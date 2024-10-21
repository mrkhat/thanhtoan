<?php

namespace backend\modules\repair_printer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\repair_printer\models\printer;

/**
 * PrinterSreach represents the model behind the search form about `backend\modules\repair_printer\models\printer`.
 */
class PrinterSreach extends printer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['instore', 'key', 'model', 'day_delivery', 'day_manufacture', 'day_instore', 'room', 'note2', 'note', 'Serrial', 'Type'], 'safe'],
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
        $query = printer::find();

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
            'price' => $this->price,
            'day_delivery' => $this->day_delivery,
            'day_manufacture' => $this->day_manufacture,
            'day_instore' => $this->day_instore,
        ]);

        $query->andFilterWhere(['like', 'instore', $this->instore])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'room', $this->room])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'Serrial', $this->Serrial])
            ->andFilterWhere(['like', 'Type', $this->Type]);

        return $dataProvider;
    }
}
