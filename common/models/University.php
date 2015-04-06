<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "university".
 *
 * @property integer $university_id
 * @property string $university_name
 * @property string $university_domain
 * @property integer $university_require_verify
 * @property string $university_id_template
 *
 * @property Filter[] $filters
 * @property Student[] $students
 */
class University extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['university_name', 'university_id_template'], 'required'],
            [['university_require_verify'], 'integer'],
            [['university_name', 'university_domain', 'university_id_template'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'university_id' => Yii::t('app', 'University ID'),
            'university_name' => Yii::t('app', 'University Name'),
            'university_domain' => Yii::t('app', 'University Domain'),
            'university_require_verify' => Yii::t('app', 'University Require Verify'),
            'university_id_template' => Yii::t('app', 'University Id Template'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilters()
    {
        return $this->hasMany(Filter::className(), ['university_id' => 'university_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['university_id' => 'university_id']);
    }
}
