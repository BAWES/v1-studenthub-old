<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\University;
use common\models\Student;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
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
     * Lists all University models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => University::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single University model.
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
     * Creates a new University model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new University();
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->uploadFileToAttribute('university_logo', UploadedFile::getInstance($model, 'university_logo'));
            $model->uploadFileToAttribute('university_graphic', UploadedFile::getInstance($model, 'university_graphic'));
            $model->uploadFileToAttribute('university_id_template', UploadedFile::getInstance($model, 'university_id_template'));
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->university_id]);
            }
        }
        
        
        return $this->render('create', [
            'model' => $model,
        ]);
        
    }

    /**
     * Updates an existing University model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->uploadFileToAttribute('university_logo', UploadedFile::getInstance($model, 'university_logo'));
            $model->uploadFileToAttribute('university_graphic', UploadedFile::getInstance($model, 'university_graphic'));
            $model->uploadFileToAttribute('university_id_template', UploadedFile::getInstance($model, 'university_id_template'));
            
            
            if($model->save()){
                //Update university model beforeSave and beforeDelete to delete their images on update and delete
                return $this->redirect(['view', 'id' => $model->university_id]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
        
    }

    /**
     * Lists all University to be merged.
     * @return mixed
     */
    public function actionListMerge()
    {
        if (Yii::$app->request->isPost) {
            if (isset(Yii::$app->request->post()['selection_all'])) {
                # code...
            }
            return $this->redirect(['merge', 'id' => Yii::$app->request->post()['selection']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => University::find(),
        ]);

        return $this->render('list-merge', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Merge several Universitis.
     * If merge is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionMerge(array $id = [])
    {
        $models;
        foreach ($id as $key => $value) {
            $models[] = $this->findModel($value);
        }

        $newModel = new University();
        $isNewUniversity = false;

        if (Yii::$app->request->isPost) {

            $post = Yii::$app->request->post();

            // if merged into new University
            if ($post['choosenUniversity'] == '0') {
                $newModel->load($post);
                $newModel->uploadFileToAttribute('university_logo', UploadedFile::getInstance($newModel, 'university_logo'));
                $newModel->uploadFileToAttribute('university_graphic', UploadedFile::getInstance($newModel, 'university_graphic'));
                $newModel->uploadFileToAttribute('university_id_template', UploadedFile::getInstance($newModel, 'university_id_template'));
                
                if($newModel->save()){
                    $isNewUniversity = true;
                } else {
                    // new univ must be corrected by admin
                    return $this->render('merge', [
                        'models' => $models,
                        'newModel' => $newModel,
                        'isNewUniversity' => true, // true means predefined choosen univ is new univ
                    ]);
                }
            }

            // get id of university that merged into
            $choosenUniversity = $isNewUniversity ? $newModel->university_id : $post['choosenUniversity'];
            
            foreach ($id as $key => $value) {
                if ($value != $choosenUniversity) {
                    // update old student university to new choosen university
                    $students = Student::findAll(['university_id' => $value]);
                    foreach ($students as $key => $student) {
                        $student->university_id = $choosenUniversity;
                        $student->save();
                    }

                    // delete old university
                    $deletedUniversities = University::findAll(['university_id' => $value]);
                    foreach ($deletedUniversities as $key => $deletedUniversity) {
                        $deletedUniversity->delete();
                    }
                }
            }

            return $this->redirect(['view', 'id' => $choosenUniversity]);
        }

        return $this->render('merge', [
            'models' => $models,
            'newModel' => $newModel,
            'isNewUniversity' => $isNewUniversity,
        ]);
    }


    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return University the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
