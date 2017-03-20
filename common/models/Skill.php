<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skill".
 *
 * @property integer $skill_id
 * @property string $skill_en
 * @property string $skill_ar
 * @property string $skill_created_at
 * @property string $skill_updated_at
 *
 * @property JobSkill[] $jobSkills
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_en', 'skill_ar'], 'required'],
            [['skill_created_at', 'skill_updated_at'], 'safe'],
            [['skill_en', 'skill_ar'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'skill_id' => 'Skill ID',
            'skill_en' => 'Skill En',
            'skill_ar' => 'Skill Ar',
            'skill_created_at' => 'Skill Created At',
            'skill_updated_at' => 'Skill Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobSkills()
    {
        return $this->hasMany(JobSkill::className(), ['skill_id' => 'skill_id']);
    }
}
