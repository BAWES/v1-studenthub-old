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
        $model->job_startdate = date("Y/m/d");
        

        if ($model->load(Yii::$app->request->post())) {
            //If draft, save without validation and redirect to dashboard
            if(Yii::$app->request->post('draft') && (Yii::$app->request->post() == 'yes')){
                $model->save(false);
                return $this->redirect(['dashboard/index', '#' => 'tab_draftJobs']);
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->job_id]);
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
     * @return mixed
     */
    public function actionCreateStep2() {
        $model = new Job();
        $model->scenario = "step2";

        //Set default values
        $model->employer_id = Yii::$app->user->identity->employer_id;
        $model->job_pay = Job::PAY_PAID;
        $model->job_startdate = date("Y/m/d");


        //If draft, save without validation and redirect to dashboard

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->job_id]);
        } else {
            return $this->render('step2', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Job model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->job_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Job model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
