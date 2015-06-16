<?php

namespace employer\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

class CreditController extends \yii\web\Controller {

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
     * Renders Employer Dashboard containing all jobs posted + link to create a new job
     */
    public function actionIndex() {
        
        if(Yii::$app->request->post("creditPurchase")){
            $creditPurchaseAmount = (int) Yii::$app->request->post("creditPurchase");
            $paymentMethod = (int) Yii::$app->request->post("paymentOption");
            $termsAgreed = Yii::$app->request->post("terms", 0);
            
            
            if(!$termsAgreed){
                Yii::$app->session->setFlash('error', Yii::t("frontend", "Please agree to the terms and conditions"));
            }else if($creditPurchaseAmount >= 10){
                /**
                 * Process credit purchase
                 */
                
                if($paymentMethod == \common\models\PaymentType::TYPE_KNET){
                    /**
                     * Purchase Credit Using KNET
                     */
                    
                    
                    
                }else{
                    Yii::$app->session->setFlash('error', Yii::t("frontend", "Invalid payment method"));
                }
                
                
            }
        }
        
        return $this->render('index');
    }

    

}
