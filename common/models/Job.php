<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "job".
 *
 * @property integer $job_id
 * @property integer $jobtype_id
 * @property integer $employer_id
 * @property integer $filter_id
 * @property string $job_title
 * @property integer $job_pay
 * @property string $job_startdate
 * @property string $job_responsibilites
 * @property string $job_other_qualifications
 * @property string $job_desired_skill
 * @property string $job_compensation
 * @property string $job_question_1
 * @property string $job_question_2
 * @property integer $job_max_applicants
 * @property integer $job_current_num_applicants
 * @property integer $job_status
 * @property string $job_price_per_applicant
 * @property integer $job_broadcasted
 * @property string $job_updated_datetime
 * @property string $job_created_datetime
 *
 * @property Jobtype $jobtype
 * @property Employer $employer
 * @property Filter $filter
 * @property NotificationEmployer[] $notificationEmployers
 * @property NotificationStudent[] $notificationStudents
 * @property StudentJobApplication[] $studentJobApplications
 * @property StudentJobQualification[] $studentJobQualifications
 * @property JobProcessQueue[] $jobProcessQueues
 * @property KnetPayment[] $knetPayments
 * @property Payment[] $payments
 * @property Student[] $applicants
 */
class Job extends \yii\db\ActiveRecord
{
    //Options for `job_pay` column
    //Specifies if the job pays or not
    const PAY_PAID = 1;
    const PAY_NOT_PAID = 0;
    
    //Options for `job_status` column
    //Job status affects the visibility of the job (draft,open, or closed)
    const STATUS_DRAFT = 0;
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;
    const STATUS_PENDING = 3; //If its pending - admin must verify
    
    //Options for `job_broadcasted` column
    //Broadcast cron will ignore jobs already broadcasted
    const BROADCASTED_YES = 1;
    const BROADCASTED_NO = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }
    
    public static function find()
    {
        return new JobQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jobtype_id', 'job_title', 'job_pay', 'job_responsibilites', 'job_desired_skill', 'job_max_applicants', 'job_price_per_applicant'], 'required'],
            [['job_other_qualifications', 'job_compensation'], 'safe'],
            
            [['job_max_applicants'], 'integer', 'min' => 10],
            [['job_price_per_applicant'], 'number', 'min' => 0.1],
            
            //Length validation
            [['job_title', 'job_compensation'], 'string', 'max' => 255],
            
            //Date Validation
            [['job_startdate'], 'date', 'format' => 'yyyy/MM/dd'],
            
            //Job Type Existence Validation
            ['jobtype_id', 'exist',
                'targetClass' => '\common\models\Jobtype',
                'targetAttribute' => 'jobtype_id',
                'message' => \Yii::t('frontend','This job type does not exist.')
            ],
                        
            //`job_pay` rules
            ['job_pay', 'in', 'range' => [self::PAY_PAID, self::PAY_NOT_PAID]],
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'job_created_datetime',
                'updatedAtAttribute' => 'job_updated_datetime',
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
            'job_id' => Yii::t('app', 'Job ID'),
            'jobtype_id' => Yii::t('app', 'Type'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'filter_id' => Yii::t('app', 'Filter ID'),
            'job_title' => Yii::t('app', 'Job Title'),
            'job_pay' => Yii::t('app', 'Paid'),
            'job_startdate' => Yii::t('app', 'Work Starting Date'),
            'job_responsibilites' => Yii::t('app', 'Responsibilites'),
            'job_other_qualifications' => Yii::t('app', 'Other Qualifications'),
            'job_desired_skill' => Yii::t('app', 'Desired Skills'),
            'job_compensation' => Yii::t('app', 'Compensation'),
            'job_question_1' => Yii::t('app', 'Question 1'),
            'job_question_2' => Yii::t('app', 'Question 2'),
            'job_max_applicants' => Yii::t('app', 'Max # of Applicants'),
            'job_current_num_applicants' => Yii::t('app', 'Current Applicants'),
            'job_status' => Yii::t('app', 'Job Status'),
            'job_price_per_applicant' => Yii::t('app', 'Job Price Per Applicant'),
            'job_broadcasted' => Yii::t('app', 'Job Broadcasted'),
            'job_updated_datetime' => Yii::t('app', 'Job Updated Datetime'),
            'job_created_datetime' => Yii::t('app', 'Job Created Datetime'),
        ];
    }
    
    /**
     * @return string the users job status
     */
    public function getJobStatus(){
        switch($this->job_status){
            case self::STATUS_DRAFT:
                return Yii::t('app', 'Draft');
                break;
            case self::STATUS_OPEN:
                return Yii::t('app', 'Open');
                break;
            case self::STATUS_CLOSED:
                return Yii::t('app', 'Closed');
                break;
            case self::STATUS_PENDING:
                return Yii::t('app', 'Pending');
                break;
        }
    }
    
    /**
     * Closes the job
     */
    public function close(){
        if($this->job_status != self::STATUS_CLOSED){
            $this->job_status = self::STATUS_CLOSED;
            $this->save(false);
        }
    }
    
    /**
     * Check if number of max applicants has been reached
     * Closes the job if it did
     */
    public function checkMaxApplicantsReached(){
        /**
         * Send a congrats email to Employer if this is his first application for this job
         */
        if($this->job_current_num_applicants == 1){
            if($this->employer->employer_language_pref == "en-US"){
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = false;

                //Send English Email
                Yii::$app->mailer->compose([
                        'html' => "employer/first-applicant-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject('[StudentHub] You got your first applicant for '.$this->job_title."!")
                    ->send();
            }else{
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = true;

                //Send Arabic Email
                Yii::$app->mailer->compose([
                        'html' => "employer/first-applicant-ar-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject('[StudentHub] حصلت على طالب الأول للحصول على وظيفة '.$this->job_title."!")
                    ->send();
            }
        }
        
        
        /**
         * Close the job once it reaches max number of applicants
         */
        if(($this->job_current_num_applicants >= $this->job_max_applicants) && ($this->job_status != self::STATUS_CLOSED)){
            
            /**
             * Send Email about reaching max applicants and job going to be closed
             */
            if($this->employer->employer_language_pref == "en-US"){
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = false;

                //Send English Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-finished-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] Your listing has been taken down")
                    ->send();
            }else{
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = true;

                //Send Arabic Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-finished-ar-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] تم إغلاق فرصة عملك")
                    ->send();
            }
            
            $this->close();
        }
    }
    
    
    /**
     * Check whether a job has interview questions or not
     * @return boolean
     */
    public function hasInterviewQuestions(){
        if($this->job_question_1 || $this->job_question_2){
            return true;
        }
        return false;
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualifiedStudents(){
        /**
         * Only verified and non-banned students
         */
        $students = Student::find()->active();

        /**
         * Add conditions based on filter values
         */
        $filter = $this->filter;
        if($filter){
            $countryList = $filter->countries;
            $universityList = $filter->universities;
            $languageList = $filter->languages;
            $majorList = $filter->majors;

            $students->minimumGPA($filter->filter_gpa);
            $students->graduationYearBetween($filter->filter_graduation_year_start, $filter->filter_graduation_year_end);
            $students->englishLevel($filter->filter_english_level);
            $students->degree($filter->degree_id);
            $students->nationalityFilter(ArrayHelper::getColumn($countryList, "country_id"));
            $students->universityFilter(ArrayHelper::getColumn($universityList, "university_id"));
            $students->languageFilter(ArrayHelper::getColumn($languageList, "language_id"));
            $students->majorFilter(ArrayHelper::getColumn($majorList, "major_id"));
            if($filter->filter_transportation){
                $students->transportationAvailable($filter->filter_transportation);
            }
        }
        
        return $students;
    }
    
    public function getQualifiedStudentsCount(){
        return $this->getQualifiedStudents()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobtype()
    {
        return $this->hasOne(Jobtype::className(), ['jobtype_id' => 'jobtype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['employer_id' => 'employer_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilter()
    {
        return $this->hasOne(Filter::className(), ['filter_id' => 'filter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationEmployers()
    {
        return $this->hasMany(NotificationEmployer::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStudents()
    {
        return $this->hasMany(NotificationStudent::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobApplications()
    {
        return $this->hasMany(StudentJobApplication::className(), ['job_id' => 'job_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplicants()
    {
        return $this->hasMany(Student::className(), ['student_id' => 'student_id'])->via('studentJobApplications');;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentJobQualifications()
    {
        return $this->hasMany(StudentJobQualification::className(), ['job_id' => 'job_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobProcessQueues()
    {
        return $this->hasMany(JobProcessQueue::className(), ['job_id' => 'job_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKnetPayments()
    {
        return $this->hasMany(KnetPayment::className(), ['job_id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['job_id' => 'job_id']);
    }
}
