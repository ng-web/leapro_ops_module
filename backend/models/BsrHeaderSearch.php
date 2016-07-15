<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BsrHeader;

/**
 * BsrHeaderSearch represents the model behind the search form about `backend\models\BsrHeader`.
 */
class BsrHeaderSearch extends BsrHeader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bsr_id', 'job_id', 'employee_id'], 'integer'],
            [['bsr_docnum', 'bsr_approvedby', 'bsr_verifiedby', 'bsr_date'], 'safe'],
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
        $query = BsrHeader::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'bsr_id' => $this->bsr_id,
            'bsr_date' => $this->bsr_date,
            'job_id' => $this->job_id,
            'employee_id' => $this->employee_id,
        ]);

        $query->andFilterWhere(['like', 'bsr_docnum', $this->bsr_docnum])
            ->andFilterWhere(['like', 'bsr_approvedby', $this->bsr_approvedby])
            ->andFilterWhere(['like', 'bsr_verifiedby', $this->bsr_verifiedby]);

        return $dataProvider;
    }
}
