<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pest;

/**
 * PestSearch represents the model behind the search form about `backend\models\Pest`.
 */
class PestSearch extends Pest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pest_id'], 'integer'],
            [['pest_name', 'pest_description'], 'safe'],
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
        $query = Pest::find();

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
            'pest_id' => $this->pest_id,
        ]);

        $query->andFilterWhere(['like', 'pest_name', $this->pest_name])
            ->andFilterWhere(['like', 'pest_description', $this->pest_description]);

        return $dataProvider;
    }
}
