<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PmiActivity;

/**
 * PmiActivitySearch represents the model behind the search form about `backend\models\PmiActivity`.
 */
class PmiActivitySearch extends PmiActivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pest_id', 'activity_type', 'count', 'action'], 'integer'],
            [['comments', 'pmi_id', 'area_id'], 'safe'],
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
        $query = PmiActivity::find();

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
        
        $query->joinWith('pmi');
        $query->joinWith('area');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pest_id' => $this->pest_id,
            'activity_type' => $this->activity_type,
            'count' => $this->count,
            'action' => $this->action,
            
        ]);

        $query->andFilterWhere(['like', 'comments', $this->comments])
              ->andFilterWhere(['like', 'pmi_report.pmi_docnum', $this->pmi_id])
              ->andFilterWhere(['like', 'area.area_name', $this->area_id]);

        return $dataProvider;
    }
}
