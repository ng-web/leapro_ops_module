<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `backend\models\Contact`.
 */
class ContactSearch extends Contact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_id', 'address_id'], 'integer'],
            [['contact_name', 'contact_number', 'contact_cell', 'contact_fax', 'contact_email'], 'safe'],
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
        $query = Contact::find();

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
            'contact_id' => $this->contact_id,
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'contact_cell', $this->contact_cell])
            ->andFilterWhere(['like', 'contact_fax', $this->contact_fax])
            ->andFilterWhere(['like', 'contact_email', $this->contact_email]);

        return $dataProvider;
    }
}
