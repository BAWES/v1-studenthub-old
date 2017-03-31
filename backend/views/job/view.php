<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Job;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_title?$model->job_title:"Draft";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employer->employer_company_name, 'url' => ['employer/view', 'id' => $model->employer_id]];
$this->params['breadcrumbs'][] = $this->title;

//Different formatting for each job status
$color = "";
switch ($model->job_status){
    case Job::STATUS_CLOSED:
        $color = "red";
        break;
    case Job::STATUS_DRAFT:
        $color = "";
        break;
    case Job::STATUS_OPEN:
        $color = "green";
        break;
    case Job::STATUS_PENDING:
        $color = "orange";
        break;
}
?>
<div class="job-view">

    <div class="jumbotron">
        <h1><?= $this->title ?> 
        </h1>

        <p class="lead"><?= Html::a($model->employer->employer_company_name, ['employer/view', 'id'=>$model->employer->employer_id],['target' => '_blank']) ?>
            <br/>Status: <em style='color: <?= $color ?>'><?= $model->jobStatus ?></em>
        </p>
    </div>
    
    <?php if($model->job_status == Job::STATUS_PENDING){ ?>
    <div class="alert alert-warning">
        <a href='<?= Url::to(['job/verify', 'id' => $model->job_id]) ?>' 
           data-confirm='Are you sure you want to verify this listing?'
           class='btn btn-warning pull-right'>Verify</a>
        
        <h4>This Job is Pending Verification</h4>
        <p>
            Please review the job details then `Verify` this listing
        </p>
    </div>
    <?php } ?>

    <br/>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobtype.jobtype_name_en',
            'job_pay:boolean',
            'job_startdate',
            'job_responsibilites:ntext',
            'job_other_qualifications:ntext',
            'job_desired_skill:ntext',
            'job_compensation',
            'job_max_applicants',
            'job_current_num_applicants',
            'studentContactedCount',
            'salary',
            'salary_currency',
            'job_updated_datetime:datetime',
            'job_created_datetime:datetime',
        ],
    ]) ?>

    <!-- job questions -->

    <?php if($model->questions) { ?>
    <h2>Job Questions</h2>
    <ul>
        <?php foreach ($model->questions as $key => $value) { ?>
        <li>
            <?= $value->question ?>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>


    <!-- job offices -->

    <?php if($model->offices) { ?>
    <h2>Job Offices</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Office name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
        <?php 

        foreach ($model->offices as $key => $value) { 

            $office = $value->office; ?>
        <tr>
            <td><?= $office->office_name_en ?></td>
            <td><?= $office->office_address ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>

    <?php
    $jobApplications = $model->getStudentJobApplications()->with("student")->all();
    if($jobApplications){
    ?>
    <h2>Applicants</h2>
    <ul>
        <?php foreach($jobApplications as $application){ ?>
        <li>
            <a href="<?= Url::to(['student/view', 'id' => $application->student->student_id]) ?>" 
               style='font-size:1.5em'
               target="_blank">
                <?= $application->student->student_firstname." ".$application->student->student_lastname ?>
            </a> <a href='<?= Url::to(['job/remove-application', 'id' => $application->application_id]) ?>'
                       data-confirm="Are you sure you wish to remove application and qualification? This is permanent"
                       style="color:red; font-size:0.7em;">
                        Remove Application + Qualification + Refund spot + Re-open if closed
                    </a>
            <ul>
                <?php foreach ($application->questions as $key => $value) { ?>
                <li>
                    <b><?= $value->question ?></b>
                    <br/>
                    <?= $value->answer ?>
                </li>
                <?php } ?>               
            </ul>
        </li>
        <?php } ?>
    </ul><br/><br/>
    <?php } ?>
    
    <hr/>
    
    <?php if($model->job_status == Job::STATUS_OPEN){ ?>
        <a href="<?= Url::to(['job/force-close', 'id' => $model->job_id]) ?>" 
           data-confirm="Are you sure you wish to close this job? This is permanent"
           class="btn btn-danger">Force Close Job</a><br/>
    <?php } ?>
    
    <hr/>
    
    <h2>Payments</h2>
    <?php
    $paymentDataProvider = new ActiveDataProvider([
            'query' => $model->getPayments()->orderBy("payment_datetime DESC"),
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $paymentDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'payment_total:currency',
            'payment_employer_credit_change:currency',
            'payment_datetime:datetime',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'payment', 'template' => '{view}'],
        ],
    ]); ?>
    
   <hr/>
    
    <?php if(!($model->job_status == Job::STATUS_CLOSED || $model->job_status == Job::STATUS_DRAFT)){ ?>
        <a href="<?= Url::to(['job/display-reach', 'id' => $model->job_id]) ?>" class="btn btn-warning btn-block">View Job Reach</a>
    <?php } ?>
</div>
