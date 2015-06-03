<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\Job;
use yii\data\ActiveDataProvider;

class JobController extends \yii\web\Controller {
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], //only allow authenticated users to job actions
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'apply' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    
    /**
     * Handles student application for job
     */
    public function actionApply(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = [
            'valid' => false,
            'message' => "Default Message",
        ];
        
        $studentApplication = new \frontend\models\StudentJobApplication();
        $studentApplication->student_id = Yii::$app->user->identity->student_id;
        $studentApplication->job_id = Yii::$app->request->post('job');
        $studentApplication->application_answer_1 = Yii::$app->request->post('answer1');
        $studentApplication->application_answer_2 = Yii::$app->request->post('answer2');
        
        if($studentApplication->save()){
            $response['valid'] = true;
            $response['message'] = Yii::t("frontend", "You have applied!");
        }else{
            $response['valid'] = false;
            $response['message'] = $studentApplication->errors;
        }
        
        return $response;
    }
    
    /**
     * Render a list of jobs the student qualifies for
     * Ordered by publish date (newest jobs on top)
     */
    public function actionIndex() {
        $query = Yii::$app->user->identity->getActiveQualifiedJobs();
        
        //Allow searching and filtering on this dataprovider + possibly pagination?
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        /**
         * Get list of Jobs this student has already applied for
         * So user is not allowed to apply on already applied-for jobs
         */
        $jobsApplied = \common\models\StudentJobApplication::find()
                            ->select('job_id')
                            ->where(['student_id' => Yii::$app->user->identity->student_id])
                            ->asArray()
                            ->all();
        
                
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'jobsApplied' => $jobsApplied,
        ]);
    }
    
    /**
     * Displays job details for student via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id) {
        return $this->renderPartial('_detail', [
            'model' => $this->findJob($id),
        ]);
    }
    
    /**
     * Displays job interview questions for student via AJAX
     * @param integer $id
     * @return mixed
     */
    public function actionQuestions($id) {
        return $this->renderPartial('_questions', [
            'model' => $this->findJob($id),
        ]);
    }

    /**
     * Finds the Job model based on its primary key value.
     * Student must qualify for this job or it wont be found
     * If the job is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findJob($id)
    {
        $model = \common\models\StudentJobQualification::find()->where([
                'job_id' => $id,
                'student_id' => Yii::$app->user->identity->student_id,
            ])->with('job')->one();
                
        if ($model) {
            return $model->job;
        } else {
            throw new NotFoundHttpException('The requested job does not exist.');
        }
    }
    

}
