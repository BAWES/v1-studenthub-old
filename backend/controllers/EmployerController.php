<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Employer;
use common\models\EmployerSearch;
use common\models\Payment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
     * @param int $id Employer ID
     * @return mixed
     */
    public function actionGift($id){
        $employer = $this->findModel($id);
        $payment = new Payment();
        $payment->scenario = "giveaway"; //To validate that change can be no less than 1
        
        if (isset($_POST["Payment"]["payment_employer_credit_change"])) {
            $giftAmount = $_POST["Payment"]["payment_employer_credit_change"];
            $adminName = Yii::$app->user->identity->admin_name;
            
            Payment::giveEmployerGift($employer, $adminName, $giftAmount);

            return $this->redirect(['view', 'id' => $employer->employer_id]);
        }
        
        return $this->render('gift', [
            'employer' => $employer,
            'payment' => $payment,
        ]);
    }
    
    /**
     * Give Refund in credit to Employer
     * @param int $id Employer ID
     * @return mixed
     */
    public function actionRefund($id){
        $employer = $this->findModel($id);
        $payment = new Payment();
        $payment->scenario = "giveaway"; //To validate that change can be no less than 1
        
        if (isset($_POST["Payment"]["payment_employer_credit_change"]) && isset($_POST["Payment"]["payment_note"])) {
            $refundAmount = $_POST["Payment"]["payment_employer_credit_change"];
            $reason = $_POST["Payment"]["payment_note"];
            
            $employer->giveRefund($refundAmount, $reason);

            return $this->redirect(['view', 'id' => $employer->employer_id]);
        }
        
        return $this->render('refund', [
            'employer' => $employer,
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
                ->select('payment.employer_id')
                ->from('payment')
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
