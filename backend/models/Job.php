<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\helpers\Url;
use common\models\JobProcessQueue;
use common\models\StudentJobQualification;
use common\models\NotificationStudent;

/**
 * This is the model class for table "job".
 * It extends from \common\models\Job but with custom functionality for Backend application module
 * 
 */
class Job extends \common\models\Job {

    /**
     * Verifies the Job and changes the status to Open
     * @return boolean successfully verified
     */
    public function verify() {
        //If Job pending, verify
        if($this->job_status == self::STATUS_PENDING){
            $this->job_status = self::STATUS_OPEN;
            
            $this->save(false);
            
            Yii::info("[Job #".$this->job_id." - ".$this->job_title."] has been approved by ".Yii::$app->user->identity->admin_name, __METHOD__);
            
            /**
             * Email to Employer that his job has been approved
             */
            if($this->employer->employer_language_pref == "en-US"){
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = false;

                //Send English Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-approved-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] Your job posting has been approved and posted!")
                    ->send();
            }else{
            
                //Set language based on preference stored in DB
                Yii::$app->view->params['isArabic'] = true;

                //Send Arabic Email
                Yii::$app->mailer->compose([
                        'html' => "employer/job-approved-ar-html",
                            ], [
                        'employer' => $this->employer,
                        'job' => $this,
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                    ->setTo([$this->employer->employer_email])
                    ->setSubject("[StudentHub] تم الموافقة على وظيفتك و تم نشرها")
                    ->send();
            }
            
            return true;
        }
        return false;
    }
    
    /**
     * Send email to Buffer so this job gets broadcasted on social media platforms
     * This should only function if the app isn't on demo platform
     */
    public function broadcastSocialMedia(){
        if(!Yii::$app->params['isDemo']){
            Yii::$app->mailer->compose([
                    'htmlLayout' => false,
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo(["buffer-a476578e6c7d182b43a9@to.bufferapp.com"])
                ->setSubject("Job Opportunity: ".$this->job_title." @ ".$this->employer->employer_company_name)
                ->setTextBody(Url::toRoute(['job/share', 'id' => $this->job_id], true))
                ->send();
        }
    }
}