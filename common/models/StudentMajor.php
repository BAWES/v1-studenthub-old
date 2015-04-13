<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student_major".
 *
 * @property integer $student_id
 * @property integer $major_id
 *
 * @property Student $student
 * @property Major $major
 */
class StudentMajor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_major';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'major_id'], 'required'],
            [['student_id', 'major_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => Yii::t('app', 'Student ID'),
            'major_id' => Yii::t('app', 'Major ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['major_id' => 'major_id']);
    }
}
