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
