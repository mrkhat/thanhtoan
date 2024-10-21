<?php

namespace backend\modules\tscd\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\tscd\models\Tscd;

/**
 * TscdSreach represents the model behind the search form about `backend\modules\tscd\models\Tscd`.
 */
class TscdSreach extends Tscd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'number'], 'integer'],
            [['display_date','room1', 'location', 'nguoigiao', 'cv1', 'nguoinhan', 'cv2', 'room2', 'item', 'unit', 'configuration', 'note'], 'safe'],
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
        $query = Tscd::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[ 'defaultOrder' => [
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
            'display_date' => $this->display_date,
           
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'nguoigiao', $this->nguoigiao])
            ->andFilterWhere(['like', 'cv1', $this->cv1])
                ->andFilterWhere(['like', 'room1', $this->room1])
            ->andFilterWhere(['like', 'nguoinhan', $this->nguoinhan])
            ->andFilterWhere(['like', 'cv2', $this->cv2])
            ->andFilterWhere(['like', 'room2', $this->room2])
            ->andFilterWhere(['like', 'item', $this->item])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'configuration', $this->configuration])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
