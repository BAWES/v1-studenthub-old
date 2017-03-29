<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_job_application_question".
 *
 * @property integer $jaq_id
 * @property string $application_id
 * @property integer $question_id
 * @property integer $question
 * @property integer $answer
 *
 * @property StudentJobApplication $application
 * @property JobQuestion $question0
 */
class StudentJobApplicationQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_job_application_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application_id', 'question_id'], 'integer'],
            [['question', 'answer'], 'string'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentJobApplication::className(), 'targetAttribute' => ['application_id' => 'application_id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobQuestion::className(), 'targetAttribute' => ['question_id' => 'job_question_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jaq_id' => 'Jaq ID',
            'application_id' => 'Application ID',
            'question_id' => 'Question ID',
            'question' => 'Question',
            'answer' => 'Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(StudentJobApplication::className(), ['application_id' => 'application_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion0()
    {
        return $this->hasOne(JobQuestion::className(), ['job_question_id' => 'question_id']);
    }
}
