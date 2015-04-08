<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "university".
 *
 * @property integer $university_id
 * @property string $university_name_en
 * @property string $university_name_ar
 * @property string $university_domain
 * @property integer $university_require_verify
 * @property string $university_id_template
 * @property string $university_logo
 * @property string $university_graphic
 *
 * @property Filter[] $filters
 * @property Student[] $students
 */
class University extends \yii\db\ActiveRecord {

    //Values available for `university_require_verify`
    //This tells us if the students within the university require verification by ID
    const VERIFICATION_REQUIRED = 1;
    const VERIFICATION_NOT_REQUIRED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'university';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['university_require_verify'], 'integer'],
            [['university_id_template', 'university_logo', 'university_graphic'], 'required'],
            [['university_name_en', 'university_name_ar', 'university_domain'], 'string', 'max' => 255],
            [['university_id_template', 'university_logo', 'university_graphic'], 'file'],
            //Rule for university verification requirement
            ['university_require_verify', 'in', 'range' => [self::VERIFICATION_NOT_REQUIRED, self::VERIFICATION_REQUIRED]],
        ];
    }


    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            //Upload files if they are set to files
            $this->university_logo = $this->uploadFile($this->university_logo);
            $this->university_graphic = $this->uploadFile($this->university_graphic);
            $this->university_id_template = $this->uploadFile($this->university_id_template);
            
            //Get the dirty/old attributes and values, then delete the files
            
            
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Uploads image file to respective directory if the file is an instance of yii\web\UploadedFile
     * @param mixed $uploadedFile a variable that will be uploaded if it is an instance of yii\web\UploadedFile
     * @return string Either new filename or old filename to be stored in that attribute
     */
    private function uploadFile($uploadedFile){
        //If $uploadedFile is not an instance of yii\web\UploadedFile, return it
        if (!$uploadedFile instanceof UploadedFile) {
            return $uploadedFile;
        }
        
        
        if($uploadedFile) {
            $filename = Yii::$app->security->generateRandomString().".".$uploadedFile->extension;
            $uploadPath = Yii::getAlias('@universityImages');
            
            $uploadedFile->saveAs($uploadPath.$filename);
            return $filename;
        }
        
        return $uploadedFile;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'university_id' => Yii::t('app', 'University ID'),
            'university_name_en' => Yii::t('app', 'University Name En'),
            'university_name_ar' => Yii::t('app', 'University Name Ar'),
            'university_domain' => Yii::t('app', 'University Domain'),
            'university_require_verify' => Yii::t('app', 'University Require Verify'),
            'university_id_template' => Yii::t('app', 'University Id Template'),
            'university_logo' => Yii::t('app', 'University Logo'),
            'university_graphic' => Yii::t('app', 'University Graphic'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters() {
        return $this->hasMany(Filter::className(), ['university_id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents() {
        return $this->hasMany(Student::className(), ['university_id' => 'university_id']);
    }

}
