<?php

namespace backend\modules\repair_printer\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\repair_printer\models\repair_printer;

/**
 * Repair_printerSreach represents the model behind the search form about `backend\modules\repair_printer\models\repair_printer`.
 */
class Repair_printerSreach extends repair_printer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['maphieu', 'Ngay', 'loaimay', 'noidungsuachua', 'printerkey', 'serrial', 'SL', 'room', 'note'], 'safe'],
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
        $query = repair_printer::find();

        // add conditions that should always apply here

      $dataProvider = new ActiveDataProvider([
               'query' => $query,
        
//            'pagination' => [
//        		'pageSize' => 10 // in case you want a default pagesize
//        	],
                'sort'=>[ 'defaultOrder' => [
            'ID' => SORT_DESC,
            
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
            'ID' => $this->ID,
            'Ngay' => $this->Ngay,
            
        ]);
        $query->andWhere(['not', ['loaimay' => null]]);

             $query->andFilterWhere(['like', 'maphieu', $this->maphieu])
            ->andFilterWhere(['like', 'loaimay', $this->loaimay])
            ->andFilterWhere(['like', 'noidungsuachua', $this->noidungsuachua])
            ->andFilterWhere(['like', 'printerkey', $this->printerkey])
            ->andFilterWhere(['like', 'serrial', $this->serrial])
            ->andFilterWhere(['like', 'SL', $this->SL])
            ->andFilterWhere(['like', 'room', $this->room])
     
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
