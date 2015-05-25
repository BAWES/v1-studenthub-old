<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use common\models\Job;
use common\models\JobProcessQueue;
use common\models\StudentJobQualification;
use common\models\NotificationStudent;
use common\models\Student;


/**
 * All Cron actions related to this project
 */
class CronController extends \yii\console\Controller {
    
    /**
     * Process the next job in Queue
     */
    public function actionProcessNextJob() {
        /**
         * Find the oldest job in the queue
         */
        $queuedJob = JobProcessQueue::find()->orderBy("queue_datetime ASC")->one();
        $job = $queuedJob->job;
        
        
        /**
         * Exit if the job has already been broadcasted
         * otherwise continue processing
         */
        if($job->job_broadcasted == Job::BROADCASTED_YES){
            $this->stdout("ERROR: Job #".$job->job_id." has already been broadcasted"."\n", Console::FG_RED);
        }else{
            $this->stdout("Processing Job #".$job->job_id."\n", Console::FG_GREEN);
            $this->stdout($job->job_title." was queued ".Yii::$app->formatter->asRelativeTime($queuedJob->queue_datetime)."\n", Console::FG_YELLOW);
            
            /**
            * Delete all existing student notifications and qualifications for this job
            */
            StudentJobQualification::deleteAll(['job_id' => $job->job_id]);
            NotificationStudent::deleteAll(['job_id' => $job->job_id]);
            $this->stdout("Deleted all student qualifications and notifications for this job"."\n", Console::FG_RED);
            
            /**
             * Find and filter students who qualify, for each student that qualifies - create notification and qualification record
             */
            $this->stdout("\nLooking for qualified Applicants"."\n", Console::FG_GREY);
            
            $filter = $job->filter;
            if($filter){
                $query = Student::find();
                
                /**
                 * Only verified and non-banned students
                 */
                $query->where([
                    'student_id_verification' => Student::ID_VERIFIED,
                    'student_email_verification' => Student::EMAIL_VERIFIED,
                    'student_banned' => Student::BAN_STUDENT_NOT_BANNED,
                    ]);
                
                /**
                 * Add where conditions based on filter values
                 */
                $universityList = $filter->universities;
                $languageList = $filter->languages;
                $countryList = $filter->countries;
                $majorList = $filter->majors;
                
                
                //GPA Filter
                $query->andFilterWhere(['>=', 'student_gpa', $filter->filter_gpa]);
                //Graduation Filter
                $query->andFilterWhere(['>=', 'student_graduating_year', $filter->filter_graduation_year_start]);
                $query->andFilterWhere(['<=', 'student_graduating_year', $filter->filter_graduation_year_end]);
                //Transportation Filter
                if($filter->filter_transportation){
                    $query->andFilterWhere(['student_transportation' => $filter->filter_transportation]);
                }
                //English language filter
                $query->andFilterWhere(['student_english_level' => $filter->filter_english_level]);
                //Degree Filter
                $query->andFilterWhere(['degree_id' => $filter->degree_id]);
                
                /**
                 * Test query and output
                 */
                echo $query->createCommand()->rawSql;
                echo "\n";
                $students = $query->all();
                if($students){
                    foreach($students as $student){
                        $this->stdout($student->student_email. " record found"."\n", Console::FG_YELLOW);
                    }
                }else $this->stdout( "No records found"."\n", Console::FG_YELLOW);
                
            }
            
            
            /**
             * Set job_broadcasted to BROADCASTED_YES when the broadcast is complete
             */
            $job->job_broadcasted = Job::BROADCASTED_YES;
            //Remove comment once implementation is complete
            //$job->save(false);            
            
        }
        
        /**
         * Delete queue record for this job
         */
        $this->stdout("\nRemoving Job from Queue"."\n", Console::FG_RED);
        //Remove comment once implementation is complete
        //$queuedJob->delete();
        $this->stdout("Complete"."\n", Console::FG_GREEN);
        
        return self::EXIT_CODE_NORMAL;
    }

}