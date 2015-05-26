<?php
namespace backend\models;

use common\models\Student;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Verify ID form
 */
class VerifyIdForm extends Model
{
    public $idNumber;

    /**
     * @var \common\models\Student
     */
    private $_student;


    /**
     * Creates a form model given a Student ActiveRecord.
     *
     * @param  \common\models\Student          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if student is empty or not valid instance of Student activerecord class
     */
    public function __construct($student, $config = [])
    {
        if (empty($student) || !($student instanceof \common\models\Student)) {
            throw new InvalidParamException('Student model cannot be blank.');
        }
        $this->_student = $student;
        if (!$this->_student) {
            throw new InvalidParamException('Problem while loading student model for ID verification.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['idNumber', 'required'],
            ['idNumber', 'validateExistence'],
        ];
    }
    
    /**
     * Validates the existence of this ID for this students university
     * If a student already exists with this ID , send error
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateExistence($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $student = $this->_student;
            $universityId = $student->university_id;
            $studentIdNumber = $this[$attribute];
            
            $identityExists = Student::find()->where([
                'student_id_number' => $studentIdNumber,
                'university_id' => $universityId,
            ])->one();
            
            if($identityExists){
                $this->addError($attribute, 'This student ID is already in use within this University.');
            }
            
        }
    }

    /**
     * Saves Student ID + Marks student as ID Verified
     * Make sure to run validation before calling this method
     *
     * @return boolean if ID was verified
     */
    public function verifyIdentity()
    {
        $student = $this->_student;
        $student->student_id_number = $this->idNumber;
        $student->student_id_verification = Student::ID_VERIFIED;
        
        Yii::info("[Student #".$student->student_id."] had his identity verified by ".Yii::$app->user->identity->admin_name, __METHOD__);

        return $student->save();
    }
}
