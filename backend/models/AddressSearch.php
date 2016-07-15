<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Address;

/**
 * AddressSearch represents the model behind the search form about `backend\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_id', 'address_province', 'address_zip', 'address_type', 'address_status', 'customer_id'], 'integer'],
            [['address_line1', 'address_line2', 'address_details'], 'safe'],
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
        $query = Address::find();

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
            'address_id' => $this->address_id,
            'address_province' => $this->address_province,
            'address_zip' => $this->address_zip,
            'address_type' => $this->address_type,
            'address_status' => $this->address_status,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'address_line1', $this->address_line1])
            ->andFilterWhere(['like', 'address_line2', $this->address_line2])
            ->andFilterWhere(['like', 'address_details', $this->address_details]);

        return $dataProvider;
    }
}
