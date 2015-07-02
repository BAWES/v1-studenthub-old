<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CybersourcePayment;

/**
 * CybersourcePaymentSearch represents the model behind the search form about `common\models\CybersourcePayment`.
 */
class CybersourcePaymentSearch extends CybersourcePayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'employer_id', 'job_id'], 'integer'],
            [['payment_track_uuid', 'payment_first_name', 'payment_last_name', 'payment_email', 'payment_phone', 'payment_country', 'payment_card_number', 'payment_card_type', 'payment_card_expiry', 'payment_message', 'payment_decision', 'payment_reason_code', 'payment_auth_code', 'payment_signature', 'payment_datetime'], 'safe'],
            [['payment_amount'], 'number'],
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
        $query = CybersourcePayment::find();

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
            'payment_amount' => $this->payment_amount,
            'payment_datetime' => $this->payment_datetime,
        ]);

        $query->andFilterWhere(['like', 'payment_track_uuid', $this->payment_track_uuid])
            ->andFilterWhere(['like', 'payment_first_name', $this->payment_first_name])
            ->andFilterWhere(['like', 'payment_last_name', $this->payment_last_name])
            ->andFilterWhere(['like', 'payment_email', $this->payment_email])
            ->andFilterWhere(['like', 'payment_phone', $this->payment_phone])
            ->andFilterWhere(['like', 'payment_country', $this->payment_country])
            ->andFilterWhere(['like', 'payment_card_type', $this->payment_card_type])
            ->andFilterWhere(['like', 'payment_card_number', $this->payment_card_number])
            ->andFilterWhere(['like', 'payment_card_expiry', $this->payment_card_expiry])
            ->andFilterWhere(['like', 'payment_message', $this->payment_message])
            ->andFilterWhere(['like', 'payment_decision', $this->payment_decision])
            ->andFilterWhere(['like', 'payment_reason_code', $this->payment_reason_code])
            ->andFilterWhere(['like', 'payment_auth_code', $this->payment_auth_code])
            ->andFilterWhere(['like', 'payment_signature', $this->payment_signature]);

        return $dataProvider;
    }
}
