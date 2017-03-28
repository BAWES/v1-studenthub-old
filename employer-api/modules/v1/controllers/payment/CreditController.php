<?php

namespace employerapi\modules\v1\controllers\payment;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use common\models\Job;
use common\models\Payment;
use common\models\PaymentType;

/**
 * Credit controller 
 */
class CreditController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter for cors to work
        unset($behaviors['authenticator']);

        // Allow XHR Requests from our different subdomains and dev machines
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => Yii::$app->params['allowedOrigins'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => [],
            ],
        ];

        // Bearer Auth checks for Authorize: Bearer <Token> header to login the user
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::className(),
        ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['options'] = [
            'class' => 'yii\rest\OptionsAction',
            // optional:
            'collectionOptions' => ['GET', 'POST', 'HEAD', 'OPTIONS'],
            'resourceOptions' => ['GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        ];
        return $actions;
    }

    /**
     * Pay for job posting by credits 
     * $params $id - job id 
     */
    public function actionPay($id)
    {
        $job = Job::findOne($id);

        if(!$job) 
        {
            return [
                    "operation" => "error",
                    "message" => "Job not found"
                ];
        }

        //check if job already paid 

        $payment = Payment::findOne(['job_id' => $id]);

        if($payment) 
        {
            return [
                "operation" => "error",
                "message" => "Job already paid"
            ];
        }

        //check if client have sufficient credit 

        $employer_credit = Yii::$app->user->identity->employer_credit;

        $fee = Yii::$app->params['jobPostingFee'];

        if($fee > $employer_credit) 
        {
            return [
                "operation" => "error",
                "message" => "No sufficient credits"
            ];
        }

        //add payment 

        return Payment::addJobPayment($job);

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();      
    }
}