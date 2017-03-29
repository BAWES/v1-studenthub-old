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
            [['university_name_en', 'university_name_ar', 'university_domain'], 'string', 'max' => 255],
            // removed as student only submit only En or Ar university name
            // [['university_name_en', 'university_name_ar'], 'required'],
            [['university_name_en'], 'unique'],
            [['university_name_ar'], 'unique'],
            [['university_id_template', 'university_logo', 'university_graphic'], 'file', 'extensions' => 'png, gif, jpg'],
            //Rule for university verification requirement
            ['university_require_verify', 'in', 'range' => [self::VERIFICATION_NOT_REQUIRED, self::VERIFICATION_REQUIRED]],
        ];
    }

    /**
     * Uploads file to directory and defines it within the model attribute if it has succeeded in uploading
     * @param string $attribute attribute of this model that will be updated if the file is successfully uploaded
     * @param UploadedFile $uploadedFile instance of yii\web\UploadedFile that will be uploaded into the attribute
     */
    public function uploadFileToAttribute($attribute, $uploadedFile) {
        if ($uploadedFile) {
            $filename = Yii::$app->security->generateRandomString() . "." . $uploadedFile->extension;
            $uploadPath = Yii::getAlias('@universityImages');

            $uploadedFile->saveAs($uploadPath . "/" . $filename);

            //Delete old file that was stored within the attribute if exists
            $oldFile = $uploadPath . "/" . $this[$attribute];
            if ($this[$attribute] && file_exists($oldFile)) {
                unlink($oldFile);
            }

            //Set this models attribute to the new filename
            $this[$attribute] = $filename;
            
            //Do not re-use this function, as it does not validate
        }
    }

    /**
     * Deletes the images associated with this record
     */

    public function deleteImages() {
        if ($this->university_logo)
            unlink(Yii::getAlias('@universityImages') . "/" . $this->university_logo);
        if ($this->university_id_template)
            unlink(Yii::getAlias('@universityImages') . "/" . $this->university_id_template);
        if ($this->university_graphic)
            unlink(Yii::getAlias('@universityImages') . "/" . $this->university_graphic);
    }

    /*
     * Function called before delete of this model entry
     */

    public function beforeDelete() {
        if (parent::beforeDelete()) {
            //Get rid of all image files related to this University
            $this->deleteImages();

            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Get if verification is required or not
     * @return string text saying if required or not
     */
    public function getIsVerificationRequired(){
        if($this->university_require_verify == self::VERIFICATION_REQUIRED) return "Required";
        else return "Not Required";
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVerifiedStudents() {
        return $this->hasMany(Student::className(), ['university_id' => 'university_id'])->where([
            "student_id_verification" => Student::ID_VERIFIED,
            "student_email_verification" => Student::EMAIL_VERIFIED,
        ]);
    }
    
    /**
     * @return int Number of students within this university
     */
    public function getNumberOfStudents() {
        return $this->getStudents()->count();
    }
    
    /**
     * @return int Number of verified students within this university
     */
    public function getNumberOfVerifiedStudents() {
        return $this->getVerifiedStudents()->count();
    }

}
