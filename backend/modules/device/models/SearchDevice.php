<?php

namespace backend\modules\device\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\device\models\DeviceInformation;

/**
 * SearchDevice represents the model behind the search form about `backend\modules\device\models\Device`.
 */
class SearchDevice extends DeviceInformation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'key', 'departments','user','lever','model', 'serrial', 'location_note'], 'safe'],
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
        $query = DeviceInformation::find()->orderBy(['type'=>SORT_ASC,'key'=>SORT_DESC]);;

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
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'key', $this->key])
             ->andFilterWhere(['like', 'location_note', $this->location_note])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'serrial', $this->serrial])
            ->andFilterWhere(['like', 'departments', $this->departments])
            ->andFilterWhere(['like', 'lever', $this->lever])
             ->andFilterWhere(['like', 'user', $this->user]);
        return $dataProvider;
    }
}
