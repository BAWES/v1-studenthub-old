<?php

namespace employer\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "filter".
 * It extends from \common\models\Filter but with custom functionality for employer job creation
 * 
 */
class Filter extends \common\models\Filter {
    //majors and languages selected during job filter creation
    public $majorsSelected = [];
    public $languagesSelected = [];
    public $nationalitiesSelected = [];
    public $numberOfApplicants;
    
    //Checkboxes for Premium Filters
    public $degreeFilter = false;
    public $gpaFilter = false;
    public $graduationFilter = false;
    public $majorFilter = false;
    public $languageFilter = false;
    public $englishFilter = false;
    public $nationalityFilter = false;
        

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Employers must input number of applicants they wish to have (minimum 20)
            [['numberOfApplicants'], 'required'],
            [['numberOfApplicants'], '\common\components\ArabicNumberValidator'],
            [['numberOfApplicants'], 'integer', 'min' => 20],
            
            //Allow massive assignment of majors, languages, and filters
            [['majorsSelected', 'languagesSelected', 'nationalitiesSelected',
                'degreeFilter', 'gpaFilter', 'graduationFilter',
                'majorFilter', 'languageFilter', 'englishFilter', 'nationalityFilter', 'transportationFilter'], 'safe'],
            
            //Validate Major, Language, and Nationality selections (if selected)
            ['majorsSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Major',
                    'targetAttribute' => 'major_id',
                    'message' => \Yii::t('employer', 'Selected major does not exist.')
                ]
            ],
            ['languagesSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Language',
                    'targetAttribute' => 'language_id',
                    'message' => \Yii::t('employer', 'Selected language does not exist.')
                ]
            ],
            ['nationalitiesSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Country',
                    'targetAttribute' => 'country_id',
                    'message' => \Yii::t('employer', 'Selected nationality does not exist.')
                ]
            ],
        ]);
    }

    /**
     * Attribute labels that are inherited are extended here
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'numberOfApplicants' => Yii::t('employer', 'Number of Applicants'),
            'majorsSelected' => Yii::t('employer', 'Majors'),
            'languagesSelected' => Yii::t('employer', 'Languages'),
            'nationalitiesSelected' => Yii::t('employer', 'Nationalities'),
            
            'degreeFilter' => Yii::t('employer', 'Filter students by Degree'),
            'gpaFilter' => Yii::t('employer', 'Filter students by GPA'),
            'graduationFilter' => Yii::t('employer', 'Filter students by Graduation Year'),
            'majorFilter' => Yii::t('employer', 'Filter students by Major'),
            'languageFilter' => Yii::t('employer', 'Filter students by Language Spoken'),
            'englishFilter' => Yii::t('employer', 'Filter students by English language level'),
            'nationalityFilter' => Yii::t('employer', 'Filter students by Nationality'),
        ]);
    }
    
    
    public function afterFind() {
        parent::afterFind();
        
        /**
         * Load selected majors, languages, and nationalities
         */
        foreach($this->majors as $major){
            $this->majorsSelected[] = $major->major_id;
        }
        foreach($this->languages as $language){
            $this->languagesSelected[] = $language->language_id;
        }
        foreach($this->countries as $country){
            $this->nationalitiesSelected[] = $country->country_id;
        }
        
        /**
         * Load Checkboxes where set
         */
        if(!empty($this->majorsSelected)){
            $this->majorFilter = true;
        }
        if(!empty($this->languagesSelected)){
            $this->languageFilter = true;
        }
        if(!empty($this->nationalitiesSelected)){
            $this->nationalityFilter = true;
        }
        if($this->filter_english_level){
            $this->englishFilter = true;
        }
        if($this->filter_graduation_year_start || $this->filter_graduation_year_end){
            $this->graduationFilter = true;
        }
        if($this->filter_gpa){
            $this->gpaFilter = true;
        }
        if($this->degree_id){
            $this->degreeFilter = true;
        }
    }

    /**
     * After the Filter is saved for this job, save the related major and language filters
     * @param type $insert
     * @param type $changedAttributes
     */
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        //Linking selected majors to student
        if (is_array($this->majorsSelected)) {
            //Unlink all majors from this Student
            $this->unlinkAll('majors', true);

            //Link the new majors to this Student
            foreach ($this->majorsSelected as $majorId) {
                $major = \common\models\Major::findOne((int) $majorId);
                if ($major) {
                    $this->link('majors', $major);
                }
            }
        }

        //Linking selected languages to student
        if (is_array($this->languagesSelected)) {
            //Unlink all languages from this Student
            $this->unlinkAll('languages', true);

            //Link the new majors to this Student
            foreach ($this->languagesSelected as $languageId) {
                $language = \common\models\Language::findOne((int) $languageId);
                if ($language) {
                    $this->link('languages', $language);
                }
            }
        }
        
        //Linking selected languages to student
        if (is_array($this->nationalitiesSelected)) {
            //Unlink all languages from this Student
            $this->unlinkAll('countries', true);

            //Link the new majors to this Student
            foreach ($this->nationalitiesSelected as $nationalityId) {
                $nationality = \common\models\Country::findOne((int) $nationalityId);
                if ($language) {
                    $this->link('countries', $nationality);
                }
            }
        }
    }


}
