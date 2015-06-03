<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Job;

/**
 * Filter Form, allows student to filter from available jobs
 */
class FilterForm extends Model
{
    public $jobtype;
    public $industry;
    public $payment;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Job Type Existence Validation
            ['jobtype', 'exist',
                'targetClass' => '\common\models\Jobtype',
                'targetAttribute' => 'jobtype_id',
                'message' => \Yii::t('frontend','This job type does not exist.')
            ],
            //Industry Existence Validation
            ['industry', 'exist',
                'targetClass' => '\common\models\Industry',
                'targetAttribute' => 'industry_id',
                'message' => \Yii::t('frontend', 'This industry does not exist.')
            ],
            //Payment Validation
            ['payment', 'in', 'range' => [Job::PAY_PAID, Job::PAY_NOT_PAID]],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'industry' => Yii::t('frontend', 'Industry'),
            'jobtype' => Yii::t('frontend', 'Job Type'),
            'payment' => Yii::t('frontend', 'Payment'),
        ];
    }

}
