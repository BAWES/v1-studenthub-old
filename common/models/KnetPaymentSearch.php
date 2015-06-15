<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KnetPayment;

/**
 * KnetPaymentSearch represents the model behind the search form about `common\models\KnetPayment`.
 */
class KnetPaymentSearch extends KnetPayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'employer_id', 'job_id'], 'integer'],
            [['payment_result', 'payment_trackid', 'payment_postdate', 'payment_amount', 'payment_tranid', 'payment_auth', 'payment_ref', 
                'payment_udf1', 'payment_udf2', 'payment_udf3', 'payment_udf4', 'payment_udf5', 'payment_datetime'], 'safe'],
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
        $query = KnetPayment::find();

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
            'payment_id' => $this->payment_id,
            'employer_id' => $this->employer_id,
            'job_id' => $this->job_id,
        ]);

        $query->andFilterWhere(['like', 'payment_result', $this->payment_result])
            ->andFilterWhere(['like', 'payment_trackid', $this->payment_trackid])
            ->andFilterWhere(['like', 'payment_postdate', $this->payment_postdate])
            ->andFilterWhere(['like', 'payment_amount', $this->payment_amount])
            ->andFilterWhere(['like', 'payment_tranid', $this->payment_tranid])
            ->andFilterWhere(['like', 'payment_auth', $this->payment_auth])
            ->andFilterWhere(['like', 'payment_ref', $this->payment_ref])
            ->andFilterWhere(['like', 'payment_udf1', $this->payment_udf1])
            ->andFilterWhere(['like', 'payment_udf2', $this->payment_udf2])
            ->andFilterWhere(['like', 'payment_udf3', $this->payment_udf3])
            ->andFilterWhere(['like', 'payment_udf4', $this->payment_udf4])
            ->andFilterWhere(['like', 'payment_udf5', $this->payment_udf5])
            ->andFilterWhere(['like', 'payment_datetime', $this->payment_datetime]);

        return $dataProvider;
    }
}
