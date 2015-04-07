<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Major;

/**
 * MajorSearch represents the model behind the search form about `common\models\Major`.
 */
class MajorSearch extends Major
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['major_id'], 'integer'],
            [['major_name_en', 'major_name_ar'], 'safe'],
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
        $query = Major::find();

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
            'major_id' => $this->major_id,
        ]);

        $query->andFilterWhere(['like', 'major_name_en', $this->major_name_en])
            ->andFilterWhere(['like', 'major_name_ar', $this->major_name_ar]);

        return $dataProvider;
    }
}
