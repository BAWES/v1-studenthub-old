<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employer;

/**
 * EmployerSearch represents the model behind the search form about `common\models\Employer`.
 */
class EmployerSearch extends Employer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'industry_id', 'city_id', 'employer_num_employees', 'employer_email_preference', 'employer_email_verification'], 'integer'],
            [['employer_company_name', 'employer_logo', 'employer_website', 'employer_company_desc', 'employer_contact_firstname', 'employer_contact_lastname', 'employer_contact_number', 'employer_email', 'employer_auth_key', 'employer_password_hash', 'employer_password_reset_token', 'employer_language_pref', 'employer_limit_email', 'employer_updated_datetime', 'employer_datetime'], 'safe'],
            [['employer_credit'], 'number'],
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
        $query = Employer::find();

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
            'employer_id' => $this->employer_id,
            'industry_id' => $this->industry_id,
            'city_id' => $this->city_id,
            'employer_num_employees' => $this->employer_num_employees,
            'employer_credit' => $this->employer_credit,
            'employer_email_preference' => $this->employer_email_preference,
            'employer_email_verification' => $this->employer_email_verification,
            'employer_limit_email' => $this->employer_limit_email,
            'employer_updated_datetime' => $this->employer_updated_datetime,
            'employer_datetime' => $this->employer_datetime,
        ]);

        $query->andFilterWhere(['like', 'employer_company_name', $this->employer_company_name])
            ->andFilterWhere(['like', 'employer_logo', $this->employer_logo])
            ->andFilterWhere(['like', 'employer_website', $this->employer_website])
            ->andFilterWhere(['like', 'employer_company_desc', $this->employer_company_desc])
            ->andFilterWhere(['like', 'employer_contact_firstname', $this->employer_contact_firstname])
            ->andFilterWhere(['like', 'employer_contact_lastname', $this->employer_contact_lastname])
            ->andFilterWhere(['like', 'employer_contact_number', $this->employer_contact_number])
            ->andFilterWhere(['like', 'employer_email', $this->employer_email])
            ->andFilterWhere(['like', 'employer_auth_key', $this->employer_auth_key])
            ->andFilterWhere(['like', 'employer_password_hash', $this->employer_password_hash])
            ->andFilterWhere(['like', 'employer_password_reset_token', $this->employer_password_reset_token])
            ->andFilterWhere(['like', 'employer_language_pref', $this->employer_language_pref]);

        return $dataProvider;
    }
}
