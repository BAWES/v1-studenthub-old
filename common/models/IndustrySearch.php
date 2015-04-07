<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Industry;

/**
 * IndustrySearch represents the model behind the search form about `common\models\Industry`.
 */
class IndustrySearch extends Industry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['industry_id'], 'integer'],
            [['industry_name_ar', 'industry_name_en'], 'safe'],
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
        $query = Industry::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'industry_id' => $this->industry_id,
        ]);

        $query->andFilterWhere(['like', 'industry_name_ar', $this->industry_name_ar])
            ->andFilterWhere(['like', 'industry_name_en', $this->industry_name_en]);

        return $dataProvider;
    }
}
