<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Student;

/**
 * StudentSearch represents the model behind the search form about `common\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'degree_id', 'country_id', 'university_id', 'student_english_level', 'student_gender', 'student_transportation', 'student_email_verification', 'student_id_verification', 'student_email_preference', 'student_banned'], 'integer'],
            [['student_firstname', 'student_lastname', 'student_dob', 'student_enrolment_year', 'student_graduating_year', 'student_contact_number', 'student_interestingfacts', 'student_photo', 'student_cv', 'student_skill', 'student_hobby', 'student_club', 'student_sport', 'student_experience_company', 'student_experience_position', 'student_verification_attachment', 'student_id_number', 'student_email', 'student_auth_key', 'student_password_hash', 'student_password_reset_token', 'student_language_pref', 'student_limit_email', 'student_updated_datetime', 'student_datetime'], 'safe'],
            [['student_gpa'], 'number'],
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
        $query = Student::find();

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
            'student_id' => $this->student_id,
            'degree_id' => $this->degree_id,
            'country_id' => $this->country_id,
            'university_id' => $this->university_id,
            'student_dob' => $this->student_dob,
            'student_enrolment_year' => $this->student_enrolment_year,
            'student_graduating_year' => $this->student_graduating_year,
            'student_gpa' => $this->student_gpa,
            'student_english_level' => $this->student_english_level,
            'student_gender' => $this->student_gender,
            'student_transportation' => $this->student_transportation,
            'student_email_verification' => $this->student_email_verification,
            'student_id_verification' => $this->student_id_verification,
            'student_email_preference' => $this->student_email_preference,
            'student_banned' => $this->student_banned,
            'student_limit_email' => $this->student_limit_email,
            'student_updated_datetime' => $this->student_updated_datetime,
            'student_datetime' => $this->student_datetime,
        ]);

        $query->andFilterWhere(['like', 'student_firstname', $this->student_firstname])
            ->andFilterWhere(['like', 'student_lastname', $this->student_lastname])
            ->andFilterWhere(['like', 'student_contact_number', $this->student_contact_number])
            ->andFilterWhere(['like', 'student_interestingfacts', $this->student_interestingfacts])
            ->andFilterWhere(['like', 'student_photo', $this->student_photo])
            ->andFilterWhere(['like', 'student_cv', $this->student_cv])
            ->andFilterWhere(['like', 'student_skill', $this->student_skill])
            ->andFilterWhere(['like', 'student_hobby', $this->student_hobby])
            ->andFilterWhere(['like', 'student_club', $this->student_club])
            ->andFilterWhere(['like', 'student_sport', $this->student_sport])
            ->andFilterWhere(['like', 'student_experience_company', $this->student_experience_company])
            ->andFilterWhere(['like', 'student_experience_position', $this->student_experience_position])
            ->andFilterWhere(['like', 'student_verification_attachment', $this->student_verification_attachment])
            ->andFilterWhere(['like', 'student_id_number', $this->student_id_number])
            ->andFilterWhere(['like', 'student_email', $this->student_email])
            ->andFilterWhere(['like', 'student_auth_key', $this->student_auth_key])
            ->andFilterWhere(['like', 'student_password_hash', $this->student_password_hash])
            ->andFilterWhere(['like', 'student_password_reset_token', $this->student_password_reset_token])
            ->andFilterWhere(['like', 'student_language_pref', $this->student_language_pref]);

        return $dataProvider;
    }
}
