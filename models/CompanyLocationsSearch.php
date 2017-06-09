<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompanyLocations;

/**
 * CompanyLocationsSearch represents the model behind the search form about `app\models\CompanyLocations`.
 */
class CompanyLocationsSearch extends CompanyLocations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_location_id', 'company_id', 'address_id'], 'integer'],
            [['branch_name'], 'string']
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
        $query = CompanyLocations::find();

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
            'company_location_id' => $this->company_location_id,
            'company_id'  => $this->company_id,
            'address_id'  => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name]);
        return $dataProvider;
    }
}
