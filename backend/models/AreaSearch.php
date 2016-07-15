<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Area;

/**
 * AreaSearch represents the model behind the search form about `backend\models\Area`.
 */
class AreaSearch extends Area
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area_id', 'address_id'], 'integer'],
            [['area_name', 'area_description'], 'safe'],
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
        $query = Area::find();

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
            'area_id' => $this->area_id,
            'address_id' => $this->address_id,
        ]);

        $query->andFilterWhere(['like', 'area_name', $this->area_name])
            ->andFilterWhere(['like', 'area_description', $this->area_description]);

        return $dataProvider;
    }
}
