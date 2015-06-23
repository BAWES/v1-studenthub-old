<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Payment;

class PaymentController extends \yii\web\Controller {

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
                        'roles' => ['@'], //only allow authenticated users to actions
                    ],
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
     * Renders a list of past payments for this employer
     */
    public function actionIndex() {
        $condition = [
            'employer_id' => Yii::$app->user->identity->employer_id,
        ];
        
        $payments = Payment::find()
                ->with('paymentType')
                ->where($condition)
                ->orderBy("payment_datetime DESC")
                ->all();
        
        return $this->render('index', [
            'payments' => $payments,
        ]);
    }
    
    /**
     * Display an invoice belonging to this Employer
     * @param integer $id
     */
    public function actionView($id) {
        $payment = $this->findModel($id);
        
        /**
         * Render the appropriate invoice based on scenario
         * If the payment is for a job, show job details
         * Otherwise just show credit movement
         */
        if($payment->job_id){
            return $this->render('job-invoice', [
                'payment' => $payment,
            ]);
        }else{
            return $this->render('reg-invoice', [
                'payment' => $payment,
            ]);
        }
    }
    
    public function actionTest(){
        $payment = $this->findModel(23);
        $payment->emailInvoice();
    }

    /**
     * Finds the Payment model based on its primary key value.
     * Payment must belong to this employer for it to be found
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $condition = [
            'payment_id' => (int) $id,
            'employer_id' => Yii::$app->user->identity->employer_id,
        ];
        
        if (($model = Payment::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}
