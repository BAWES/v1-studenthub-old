<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmployerOffice;

/**
 * EmployerOfficeSearch represents the model behind the search form about `common\models\EmployerOffice`.
 */
class EmployerOfficeSearch extends EmployerOffice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['office_id', 'employer_id', 'city_id'], 'integer'],
            [['office_name_en', 'office_name_ar', 'office_address', 'office_created_at', 'office_updated_at'], 'safe'],
            [['office_longitude', 'office_latitude'], 'number'],
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
        $query = EmployerOffice::find();

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
            'office_id' => $this->office_id,
            'employer_id' => $this->employer_id,
            'city_id' => $this->city_id,
            'office_longitude' => $this->office_longitude,
            'office_latitude' => $this->office_latitude,
            'office_created_at' => $this->office_created_at,
            'office_updated_at' => $this->office_updated_at,
        ]);

        $query->andFilterWhere(['like', 'office_name_en', $this->office_name_en])
            ->andFilterWhere(['like', 'office_name_ar', $this->office_name_ar])
            ->andFilterWhere(['like', 'office_address', $this->office_address]);

        return $dataProvider;
    }
}
