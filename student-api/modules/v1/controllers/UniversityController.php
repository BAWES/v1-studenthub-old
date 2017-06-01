<?php

namespace studentapi\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use common\models\University;

/**
 * University controller - Search Cities 
 */
class UniversityController extends Controller
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
                'Access-Control-Expose-Headers' => [
                    'X-Pagination-Current-Page',
                    'X-Pagination-Page-Count',
                    'X-Pagination-Per-Page',
                    'X-Pagination-Total-Count'
                ],
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
     * Return a List of Universities
     */
    public function actionAll()
    {
        return University::find()
            ->all();
    }

    /**
     * Return a List of Universities by keyword
     */
    public function actionFilter()
    {
        $keyword = Yii::$app->request->getBodyParam("keyword");

        $query = University::find();

        if($keyword) {
            $query->where(['like', 'university_name_ar', $keyword]);
            $query->orWhere(['like', 'university_name_en', $keyword]);
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 200,
            ],
        ]);
    }

    /**
     * Create a University if it isnt exists
     */
    public function actionCreate()
    {
        // Attempt to create new university
        $model = new University();
        
        $model->university_name_en = Yii::$app->request->getBodyParam("name");
        $model->university_data_source = University::FROM_STUDENT;

        if (!$model->save())
        {
            if (isset($model->errors)) {
                return [
                    "operation" => "error",
                    "message" => $model->errors
                ];
            } else {
                return [
                    "operation" => "error",
                    "message" => "We've faced a problem creating the university, please contact us for assistance."
                ];
            }
        }

        return [
            "operation" => "success",
            "message" => "University created successfully",
            "id" => $model->university_id,
        ];
    }

    /**
     * Check if typed university is exists
     */
    public function actionIsExists()
    {
        // Attempt to find typed university
        $model = new University();
        $model = University::findOne([
            'university_name_en' => Yii::$app->request->getBodyParam("keyword"),
        ]);
        
        if(!$model){
            return [
                    "operation" => "success",
                    "message" => "not found"
                ];
        } else {
            return [
                    "operation" => "success",
                    "message" => "found"
                ];
        }
    }
}