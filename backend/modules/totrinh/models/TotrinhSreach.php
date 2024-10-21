<?php

namespace backend\modules\totrinh\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\totrinh\models\Totrinh;

/**
 * TotrinhSreach represents the model behind the search form about `backend\modules\totrinh\models\totrinh`.
 */
class TotrinhSreach extends totrinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['number', 'title', 'note', 'created_by', 'created', 'modified_by', 'modified', 'date_display'], 'safe'],
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
        $query = totrinh::find();

        // add conditions that should always apply here

    

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
        		'pageSize' => 30 // in case you want a default pagesize
        	],'sort'=>[ 'defaultOrder' => [
          
//            'date_display' => SORT_DESC, 
             'year' => SORT_DESC,      
            'number' => SORT_DESC,
               'ab' => SORT_DESC,      
            
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
            'created' => $this->created,
            'modified' => $this->modified,
            'date_display' => $this->date_display,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
