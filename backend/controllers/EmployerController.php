<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Employer;
use common\models\EmployerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * EmployerController implements the CRUD actions for Employer model.
 */
class EmployerController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [//allow authenticated users only
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    
    /**
     * Give Credit Gift to Employer
     * @param int $id Employer ID to gift
     * @return mixed
     */
    public function actionGift($id){
        $model = $this->findModel($id);
        
        $payment = new \common\models\Payment();
        $payment->employer_id = $model->employer_id;
        $payment->payment_type_id = \common\models\PaymentType::TYPE_CREDIT_GIVEAWAY;
        $payment->payment_note = "Gift from Admin: ".Yii::$app->user->identity->admin_name;
        
        if ($payment->load(Yii::$app->request->post()) && $payment->save()) {
            return $this->redirect(['view', 'id' => $model->employer_id]);
        }
        
        return $this->render('gift', [
            'model' => $model,
            'payment' => $payment,
        ]);
    }

    /**
     * Lists all Employer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Employers requiring ID verification
     * You are able to remove a employer from the list
     * 
     * @return mixed
     */
    public function actionVerifyEmailRequired()
    {
        if($remove = Yii::$app->request->post("remove")){
            $employer = $this->findModel((int) $remove);
            $employer->employer_support_field = "Removed by ".Yii::$app->user->identity->admin_name
                                                    ." (".Yii::$app->user->id.")";
            $employer->save(false);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => Employer::find()
                ->where(['employer_email_verification' => Employer::EMAIL_NOT_VERIFIED])
                ->andWhere(['not like', 'employer_support_field', 'Removed'])
                ->orderBy("employer_updated_datetime DESC"),
        ]);

        return $this->render('verify-email', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Employers removed from support
     * You are able to return a employer to the list
     * 
     * @return mixed
     */
    public function actionListRemoved()
    {
        if($restore = Yii::$app->request->post("restore")){
            $employer = $this->findModel((int) $restore);
            $employer->employer_support_field = "";
            $employer->save(false);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => Employer::find()
                ->where(['employer_email_verification' => Employer::EMAIL_NOT_VERIFIED])
                ->andWhere(['like', 'employer_support_field', 'Removed'])
                ->orderBy("employer_updated_datetime DESC"),
        ]);

        return $this->render('removed-list', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionInactive(){
        $inactiveEmployerQuery = \common\models\Employer::find()->where(['not in', 'employer_id', 
            (new \yii\db\Query())
                ->select('employer.employer_id')
                ->from('employer')
                ->innerJoin('job', 'employer.employer_id = job.employer_id')
                ->innerJoin('transaction', 'job.job_id = transaction.job_id')
            ]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $inactiveEmployerQuery,
        ]);
        
        return $this->render('inactive', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the Employer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
