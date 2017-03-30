<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "employer_shortlist".
 *
 * @property integer $shortlist_id
 * @property string $employer_id
 * @property string $application_id
 * @property string $date_added
 *
 * @property StudentJobApplication $application
 * @property Employer $employer
 */
class EmployerShortlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employer_shortlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'application_id'], 'integer'],
            [['date_added'], 'safe'],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentJobApplication::className(), 'targetAttribute' => ['application_id' => 'application_id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employer::className(), 'targetAttribute' => ['employer_id' => 'employer_id']],
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_added',
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
            'shortlist_id' => 'Shortlist ID',
            'employer_id' => 'Employer ID',
            'application_id' => 'Application ID',
            'date_added' => 'Date Added',
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
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }
}
