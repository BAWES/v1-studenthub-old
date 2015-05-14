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
    public $majorsSelected;
    public $languagesSelected;
    public $numberOfApplicants;

    /**
     * @inheritdoc
     */
    public function rules() {
        return array_merge(parent::rules(), [
            //Employers must input number of applicants they wish to have (minimum 20)
            [['numberOfApplicants'], 'required'],
            [['numberOfApplicants'], '\common\components\ArabicNumberValidator'],
            [['numberOfApplicants'], 'integer', 'min' => 20],
            
            //Allow massive assignment of majors and languages
            [['majorsSelected', 'languagesSelected'], 'safe'],
            
            //Validate Major and Language selections (if selected)
            ['majorsSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Major',
                    'targetAttribute' => 'major_id',
                    'message' => \Yii::t('frontend', 'Selected major does not exist.')
                ]
            ],
            ['languagesSelected', '\common\components\ArrayValidator',
                'rule' => ['exist',
                    'targetClass' => '\common\models\Language',
                    'targetAttribute' => 'language_id',
                    'message' => \Yii::t('frontend', 'Selected language does not exist.')
                ]
            ],
        ]);
    }

    /**
     * Attribute labels that are inherited are extended here
     */
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'majorsSelected' => Yii::t('app', 'Majors selected'),
            'languagesSelected' => Yii::t('app', 'Languages selected'),
        ]);
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
    }


}
