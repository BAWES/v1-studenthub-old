<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property integer $note_id
 * @property string $note_name
 * @property string $note_value
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['note_name', 'note_value'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'note_id' => Yii::t('app', 'Note ID'),
            'note_name' => Yii::t('app', 'Note Name'),
            'note_value' => Yii::t('app', 'Note Value'),
        ];
    }
}
