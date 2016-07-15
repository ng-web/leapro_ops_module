<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PmiReport;

/**
 * PmiReportSearch represents the model behind the search form about `backend\models\PmiReport`.
 */
class PmiReportSearch extends PmiReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pmi_id', 'address_id', 'job_id', 'employee_id'], 'integer'],
            [['pmi_docnum', 'approved_by', 'verified_by', 'pmi_date'], 'safe'],
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
        $query = PmiReport::find();

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
            'pmi_id' => $this->pmi_id,
            'pmi_date' => $this->pmi_date,
            'address_id' => $this->address_id,
            'job_id' => $this->job_id,
            'employee_id' => $this->employee_id,
        ]);

        $query->andFilterWhere(['like', 'pmi_docnum', $this->pmi_docnum])
            ->andFilterWhere(['like', 'approved_by', $this->approved_by])
            ->andFilterWhere(['like', 'verified_by', $this->verified_by]);

        return $dataProvider;
    }
}
