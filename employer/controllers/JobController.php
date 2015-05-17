<?php

namespace employer\controllers;

use Yii;
use employer\models\Job;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], //only allow unauthenticated users to job actions
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Job::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = "step1";
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);

        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            if ($model->save()) {
                return $this->redirect(['create-step2', 'id' => $model->job_id]);
            }
        }
        
        return $this->render('step1', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Job model. (First Step)
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to dashboard
     * @return mixed
     */
    public function actionCreate() {
        $model = new Job();
        $model->scenario = "step1";

        //Set default values
        $model->employer_id = Yii::$app->user->identity->employer_id;
        $model->job_status = Job::STATUS_DRAFT;
        $model->job_pay = Job::PAY_PAID;
        
        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Save and go to second step
            if ($model->save()) {
                return $this->redirect(['create-step2', 'id' => $model->job_id]);
            }
        }

        return $this->render('step1', [
            'model' => $model,
        ]);
    }

    /**
     * Second Step of Job Creation
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to the dashboard
     * @param integer $id
     * @return mixed
     */
    public function actionCreateStep2($id) {
        $model = $this->findModel($id);
        $model->scenario = "step2";
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);

        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Save and go to third step
            if ($model->save()) {
                return $this->redirect(['create-step3', 'id' => $model->job_id]);
            }
        }

        return $this->render('step2', [
            'model' => $model,
        ]);
    }
    
    /**
     * Third Step of Job Creation - Selecting filters to add to your Job posting
     * If everything is valid, save and move to next step
     * 
     * Should user save it as draft, it will save without validation and 
     * take him back to the dashboard
     * @param integer $id
     * @return mixed
     */
    public function actionCreateStep3($id) {
        $model = $this->findModel($id);
        $model->scenario = "step3";
        
        //Check if editing is allowed
        $this->checkJobEditAllowed($model);
        
        
        //Load filter for this Job already if defined. Otherwise use new
        $filter = new \employer\models\Filter();
        if($model->filter){
            $filter = $model->filter;
            $filter->numberOfApplicants = $model->job_max_applicants;
        }        
        
        //On Form Submit
        if ($filter->load(Yii::$app->request->post())) {
            $model->job_max_applicants = $filter->numberOfApplicants;
            
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post('draft') == 'yes')){
                
                //IMPORTANT
                
                //Check if creating a filter is required.
                //If it is, then create then link to job model
                //If it isn't, delete existing filters and set to null
                
                $filter->save(false);
                $model->filter_id = $filter->filter_id;
                $model->save(false);
                
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            //Save and go to fourth step
            if ($filter->validate()) {
                
                //Check if creating a filter is required.
                //If it is, then create then link to job model
                //If it isn't, delete existing filters and set to null
                
                $filter->save(false);
                $model->filter_id = $filter->filter_id;
                $model->save(false);
                
                return $this->redirect(['create-step3', 'id' => $model->job_id]);
            }
        }

        return $this->render('step3', [
            'model' => $model,
            'filter' => $filter,
        ]);
    }

    
    /**
     * Allows employer to delete his own drafts
     * If deletion is successful, the browser will be redirected to the 'index' draft page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        //Check if its a draft & owned by this employer before deleting
        $model = $this->findModel($id);
        
        if($model->job_status == Job::STATUS_DRAFT){
            $model->delete();
        }else throw new \yii\web\BadRequestHttpException("You are only allowed to delete drafts");
        
        return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
    }

    
    /**
     * Checks if editing a job is allowed
     * @param Job $job
     */
    public function checkJobEditAllowed($job){
        if($job->job_status == Job::STATUS_CLOSED){
            throw new \yii\web\BadRequestHttpException("You are not allowed to update a closed job");
        }
    }
    
    /**
     * Finds the Job model based on its primary key value.
     * Job must belong to this employer for it to be found
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $condition = [
            'job_id' => (int) $id,
            'employer_id' => Yii::$app->user->identity->employer_id,
        ];
        
        if (($model = Job::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
