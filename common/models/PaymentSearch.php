<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `common\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'payment_type_id', 'employer_id', 'job_id', 'payment_job_num_applicants', 'payment_job_num_filters'], 'integer'],
            [['payment_job_initial_price_per_applicant', 'payment_job_filter_price_per_applicant', 'payment_job_total_price_per_applicant', 'payment_total', 'payment_employer_credit_before', 'payment_employer_credit_change', 'payment_employer_credit_after'], 'number'],
            [['payment_note', 'payment_datetime'], 'safe'],
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
        $query = Payment::find();

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
            'payment_type_id' => $this->payment_type_id,
            'employer_id' => $this->employer_id,
            'job_id' => $this->job_id,
            'payment_job_num_applicants' => $this->payment_job_num_applicants,
            'payment_job_num_filters' => $this->payment_job_num_filters,
            'payment_job_initial_price_per_applicant' => $this->payment_job_initial_price_per_applicant,
            'payment_job_filter_price_per_applicant' => $this->payment_job_filter_price_per_applicant,
            'payment_job_total_price_per_applicant' => $this->payment_job_total_price_per_applicant,
            'payment_total' => $this->payment_total,
            'payment_employer_credit_before' => $this->payment_employer_credit_before,
            'payment_employer_credit_change' => $this->payment_employer_credit_change,
            'payment_employer_credit_after' => $this->payment_employer_credit_after,
            'payment_datetime' => $this->payment_datetime,
        ]);

        $query->andFilterWhere(['like', 'payment_note', $this->payment_note]);

        return $dataProvider;
    }
}
