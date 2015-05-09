<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Student;
use common\models\StudentSearch;
use backend\models\VerifyIdForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Students requiring ID verification
     * You are able to remove a student from the list
     * 
     * @return mixed
     */
    public function actionVerifyIdRequired()
    {
        if($remove = Yii::$app->request->post("remove")){
            $student = $this->findModel((int) $remove);
            $student->student_support_field = "Removed by ".Yii::$app->user->identity->admin_name
                                                    ." (".Yii::$app->user->id.")";
            $student->save(false);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find()
                ->where(['student_id_verification' => Student::ID_NOT_VERIFIED])
                ->andWhere(['not like', 'student_support_field', 'Removed'])
                ->orderBy("student_updated_datetime DESC"),
        ]);

        return $this->render('verify-id', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Students requiring ID verification
     * You are able to remove a student from the list
     * 
     * @return mixed
     */
    public function actionVerifyEmailRequired()
    {
        if($remove = Yii::$app->request->post("remove")){
            $student = $this->findModel((int) $remove);
            $student->student_support_field = "Removed by ".Yii::$app->user->identity->admin_name
                                                    ." (".Yii::$app->user->id.")";
            $student->save(false);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find()
                ->where(['student_email_verification' => Student::EMAIL_NOT_VERIFIED])
                ->andWhere(['not like', 'student_support_field', 'Removed'])
                ->orderBy("student_updated_datetime DESC"),
        ]);

        return $this->render('verify-email', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Students removed from support
     * You are able to return a student to the list
     * 
     * @return mixed
     */
    public function actionListRemoved()
    {
        if($restore = Yii::$app->request->post("restore")){
            $student = $this->findModel((int) $restore);
            $student->student_support_field = "";
            $student->save(false);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find()
                ->where(['student_email_verification' => Student::EMAIL_NOT_VERIFIED])
                ->andWhere(['like', 'student_support_field', 'Removed'])
                ->orderBy("student_updated_datetime DESC"),
        ]);

        return $this->render('removed-list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        //Handle ID Verification functionality
        $verifyIdForm = new VerifyIdForm($model);
        if ($verifyIdForm->load(Yii::$app->request->post()) && $verifyIdForm->validate()) {
            //Set Student as verified
            $verifyIdForm->verifyIdentity();
        }
        
        return $this->render('view', [
            'model' => $model,
            'verifyIdForm' => $verifyIdForm,
        ]);
    }


    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
