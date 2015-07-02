<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use common\models\CybersourcePayment;

class CybersourceController extends \yii\web\Controller {

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
     * Function to initiate payment
     * if no job provided, it is for credit
     * @param double $amount
     * @param int $jobId
     */
    public function actionPay($amount = 0, $jobId = false){
        $employer = Yii::$app->user->identity;
        
        $amount = 100.000;
        $jobId = false;
        
        $payment = new CybersourcePayment($employer, $amount, $jobId);
        
        return $this->render('pay',[
            'payment' => $payment,
        ]);
    }

    

}