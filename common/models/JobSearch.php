<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Job;

/**
 * JobSearch represents the model behind the search form about `common\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'jobtype_id', 'employer_id', 'filter_id', 'job_pay', 'job_max_applicants', 'job_current_num_applicants', 'job_status'], 'integer'],
            [['job_title', 'job_startdate', 'job_responsibilites', 'job_other_qualifications', 'job_desired_skill', 'job_compensation', 'job_question_1', 'job_question_2', 'job_updated_datetime', 'job_created_datetime'], 'safe'],
            [['job_price_per_applicant'], 'number'],
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
        $query = Job::find();

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
            'job_id' => $this->job_id,
            'jobtype_id' => $this->jobtype_id,
            'employer_id' => $this->employer_id,
            'filter_id' => $this->filter_id,
            'job_pay' => $this->job_pay,
            'job_startdate' => $this->job_startdate,
            'job_max_applicants' => $this->job_max_applicants,
            'job_current_num_applicants' => $this->job_current_num_applicants,
            'job_status' => $this->job_status,
            'job_price_per_applicant' => $this->job_price_per_applicant,
            'job_updated_datetime' => $this->job_updated_datetime,
            'job_created_datetime' => $this->job_created_datetime,
        ]);

        $query->andFilterWhere(['like', 'job_title', $this->job_title])
            ->andFilterWhere(['like', 'job_responsibilites', $this->job_responsibilites])
            ->andFilterWhere(['like', 'job_other_qualifications', $this->job_other_qualifications])
            ->andFilterWhere(['like', 'job_desired_skill', $this->job_desired_skill])
            ->andFilterWhere(['like', 'job_compensation', $this->job_compensation])
            ->andFilterWhere(['like', 'job_question_1', $this->job_question_1])
            ->andFilterWhere(['like', 'job_question_2', $this->job_question_2]);

        return $dataProvider;
    }
}
