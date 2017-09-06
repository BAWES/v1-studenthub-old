<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\models\StudentJobApplicationQuestion;

/**
 * This is the model class for table "student_job_application".
 *
 * @property integer $application_id
 * @property integer $student_id
 * @property integer $job_id
 * @property integer $application_contacted
 * @property integer $application_hidden
 * @property string $application_date_apply
 *
 * @property Student $student
 * @property Job $job
 */
class StudentJobApplication extends \yii\db\ActiveRecord
{
    //Options for `application_hidden` column
    //This option allows employers to hide or show an applicant
    const HIDDEN_TRUE = 1;
    const HIDDEN_FALSE = 0;
    
    //Options for `application_contacted` column
    //This option lets us know if a student had his contact viewed
    const CONTACTED_TRUE = 1;
    const CONTACTED_FALSE = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_job_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'job_id'], 'required'],
            [['student_id', 'job_id'], 'integer'],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'application_date_apply',
                'updatedAtAttribute' => false,
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
            'application_id' => Yii::t('app', 'Application ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'job_id' => Yii::t('app', 'Job ID'),
            'application_contacted' => Yii::t('app', 'Application Contacted'),
            'application_hidden' => Yii::t('app', 'Application Hidden'),
            'application_date_apply' => Yii::t('app', 'Application Date Apply'),
        ];
    }

	/**
	 * @param string $modelClass
	 *
	 * @return \yii\db\ActiveQuery
	 */
    public function getStudent($modelClass = '\common\models\Student')
    {
        return $this->hasOne($modelClass::className(), ['student_id' => 'student_id']);
    }

	/**
	 * @param string $modelClass
	 * @return \yii\db\ActiveQuery
	 */
    public function getJob($modelClass = '\common\models\Job')
    {
        return $this->hasOne($modelClass::className(), ['job_id' => 'job_id']);
    }

	/**
	 * @param string $modelClass
	 * @return \yii\db\ActiveQuery
	 */
    public function getQuestions($modelClass = '\common\models\StudentJobApplicationQuestion')
    {
        return $this->hasMany($modelClass::className(), ['application_id' => 'application_id']);
    }
}
