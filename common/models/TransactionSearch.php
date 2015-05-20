<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form about `common\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_id', 'job_id', 'transaction_number_of_applicants'], 'integer'],
            [['transaction_price_per_applicant', 'transaction_price_total'], 'number'],
            [['transaction_datetime'], 'safe'],
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
        $query = Transaction::find();

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
            'transaction_id' => $this->transaction_id,
            'job_id' => $this->job_id,
            'transaction_number_of_applicants' => $this->transaction_number_of_applicants,
            'transaction_price_per_applicant' => $this->transaction_price_per_applicant,
            'transaction_price_total' => $this->transaction_price_total,
            'transaction_datetime' => $this->transaction_datetime,
        ]);

        return $dataProvider;
    }
}
