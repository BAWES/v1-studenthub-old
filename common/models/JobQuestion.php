<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "job_question".
 *
 * @property integer $job_question_id
 * @property string $job_id
 * @property string $question
 * @property string $question_created_at
 * @property string $question_updated_at
 *
 * @property Job $job
 * @property StudentJobApplicationQuestion[] $studentJobApplicationQuestions
 */
class JobQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id'], 'integer'],
            [['question_created_at', 'question_updated_at'], 'safe'],
//            [['question'], 'string', 'max' => 250],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'job_id']],
        ];
    }

	/**
	 * @return array
	 */
	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'question_created_at',
				'updatedAtAttribute' => 'question_updated_at',
				'value' => new Expression('NOW()'),
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_question_id' => 'Job Question ID',
            'job_id' => 'Job ID',
            'question' => 'Question',
            'question_created_at' => 'Question Created At',
            'question_updated_at' => 'Question Updated At',
        ];
    }

	/**
	 * @param string $modelClass
	 * @return \yii\db\ActiveQuery
	 */
    public function getJob($modelClass = '\common\models\job')
    {
        return $this->hasOne($modelClass::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobApplicationQuestions()
    {
        return $this->hasMany(StudentJobApplicationQuestion::className(), ['question_id' => 'job_question_id']);
    }
}
