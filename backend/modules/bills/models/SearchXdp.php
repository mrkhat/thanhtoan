<?php

namespace backend\modules\bills\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\bills\models\Xdp;

/**
 * SearchXdp represents the model behind the search form about `backend\modules\bills\models\Xdp`.
 */
class SearchXdp extends Xdp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'key', 'type', 'itemid', 'number', 'groupid', 'roomid', 'status', 'status1', 'status2', 'itop2', 'itop1'], 'integer'],
            [['note', 'deliver', 'receiver', 'created_date', 'display_date', 'note2', 'source', 'roomname', 'item', 'unit', 'groupname', 'serial', 'itemtype', 'devicekey'], 'safe'],
            [['price'], 'number'],
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
        $query = Xdp::find();

      
        $dataProvider = new ActiveDataProvider([
               'query' => $query,
                 
            'pagination' => [
        		'pageSize' => 10 // in case you want a default pagesize
        	],
                'sort'=>[ 'defaultOrder' => [
            'key' => SORT_DESC,
            
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
            'key' => $this->key,
            'type' => $this->type,
            'itemid' => $this->itemid,
            'number' => $this->number,
            'groupid' => $this->groupid,
            'roomid' => $this->roomid,
            'created_date' => $this->created_date,
            'display_date' => $this->display_date,
            'status' => $this->status,
            'status1' => $this->status1,
            'status2' => $this->status2,
        ]);

        $query->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'deliver', $this->deliver])
            ->andFilterWhere(['like', 'receiver', $this->receiver])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'roomname', $this->roomname])
            ->andFilterWhere(['like', 'item', $this->item])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'groupname', $this->groupname]);

        return $dataProvider;
    }
}