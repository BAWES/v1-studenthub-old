<?php

namespace employerapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use employerapi\models\EmployerOffice;
use yii\data\ActiveDataProvider;
/**
 * Office controller - Manage office as Employer
 */
class OfficeController extends Controller
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
     * Return a List of Office Accounts available.
     */
    public function actionList()
    {
    	$user_id = Yii::$app->user->id;
	    $query = EmployerOffice::find();
	    $query->where(['employer_id'=>$user_id]);
    	return new ActiveDataProvider([
		    'query' => $query
	    ]);
    }

    /**
     * Create a office account
     */
    public function actionCreate()
    {
        // Attempt to create new office
        $model = new EmployerOffice();
        
        $model->employer_id = Yii::$app->user->getId();
        $model->city_id = Yii::$app->request->getBodyParam("city_id");
        $model->office_name_en = Yii::$app->request->getBodyParam("name_en");
        $model->office_name_ar = Yii::$app->request->getBodyParam("name_ar");
        $model->office_longitude = Yii::$app->request->getBodyParam("longitude");
        $model->office_latitude = Yii::$app->request->getBodyParam("latitude");
        $model->office_address = Yii::$app->request->getBodyParam("address");

        if (!$model->save())
        {
            if(isset($model->errors)){
                return [
                    "operation" => "error",
                    "message" => $model->errors
                ];
            }else{
                return [
                    "operation" => "error",
                    "message" => "We've faced a problem creating the office, please contact us for assistance."
                ];
            }
        }

        return [
            "operation" => "success",
            "message" => "Office created successfully",
            "data" => $model
        ];

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }

    /**
     * Create a office account
     */
    public function actionUpdate($id)
    {
        // Attempt to find updated account
        $model = EmployerOffice::findOne([
                'office_id' => (int) $id,
                'employer_id' => Yii::$app->user->getId()
            ]);

        if(!$model){
            return [
                    "operation" => "error",
                    "message" => "Office not found."
                ];
        }

        $model->city_id = Yii::$app->request->getBodyParam("city_id");
        $model->office_name_en = Yii::$app->request->getBodyParam("name_en");
        $model->office_name_ar = Yii::$app->request->getBodyParam("name_ar");
        $model->office_longitude = Yii::$app->request->getBodyParam("longitude");
        $model->office_latitude = Yii::$app->request->getBodyParam("latitude");
        $model->office_address = Yii::$app->request->getBodyParam("address");

        if (!$model->save())
        {
            if(isset($model->errors)){
                return [
                    "operation" => "error",
                    "message" => $model->errors
                ];
            }else{
                return [
                    "operation" => "error",
                    "message" => "We've faced a problem updating the office, please contact us for assistance."
                ];
            }
        }

        Yii::info("[Office Updated] ".$model->office_name_en, __METHOD__);

        return [
            "operation" => "success",
            "message" => "Office successfully updated",
            "data" => $model
        ];

        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }

    /**
     * Delete an account
     * @param  integer $id
     * @return array
     */
    public function actionDelete($id)
    {
        $office = EmployerOffice::findOne([
                'office_id' => (int) $id,
                'employer_id' => Yii::$app->user->getId()
            ]);

        if(!$office) {
            return [
                "operation" => "error",
                "message" => "Office not found or already deleted"
            ];
        }

        Yii::warning("[Office Deleted] ".$office->office_name_en, __METHOD__);

        // Delete office
        $office->delete();

        return [
            "operation" => "success",
            "message" => "Office deleted successfully"
        ];
   
        // Check SQL Query Count and Duration
        return Yii::getLogger()->getDbProfiling();
    }

	/**
	 * return list of all office
	 * @return static[]
	 */
    public function actionListAll()
    {
	    return EmployerOffice::find()
             ->where(['employer_id' => Yii::$app->user->getId()])
             ->asArray()
             ->all();
    }
}
