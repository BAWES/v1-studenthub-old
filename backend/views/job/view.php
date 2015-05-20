<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobtype.jobtype_name_en',
            'employer.employer_company_name',
            'filter_id',
            'job_title',
            'job_pay:boolean',
            'job_startdate',
            'job_responsibilites:ntext',
            'job_other_qualifications:ntext',
            'job_desired_skill:ntext',
            'job_compensation',
            'job_question_1:ntext',
            'job_question_2:ntext',
            'job_max_applicants',
            'job_current_num_applicants',
            'job_status',
            'job_price_per_applicant',
            'job_updated_datetime',
            'job_created_datetime',
        ],
    ]) ?>
    
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->job_id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
