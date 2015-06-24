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
            'job_question_1:ntext',
            'job_question_2:ntext',
            'job_max_applicants',
            'job_current_num_applicants',
            'job_price_per_applicant:currency',
            'job_broadcasted:boolean',
            'job_updated_datetime:datetime',
            'job_created_datetime:datetime',
        ],
    ]) ?>
    
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
    
<?php if($model->filter){ $filter = $model->filter; ?>
    <h2 style="margin-top:0;">Filters Applied</h2>
    
    <div class="row" style="margin-bottom:1em;">
        <?php if($filter->degree){ ?>
        <div class="col-sm-3">
            <h4>Degree</h4>
            <?= $filter->degree->degree_name_en ?>
        </div>
        <?php } ?>
        
        <?php if($filter->filter_gpa){ ?>
        <div class="col-sm-3">
            <h4>GPA</h4>
            <?= $filter->filter_gpa ?>
        </div>
        <?php } ?>
        
        <?php if($filter->filter_graduation_year_start){ ?>
        <div class="col-sm-3">
            <h4>Graduation Year</h4>
            <?= $filter->filter_graduation_year_start." - ".$filter->filter_graduation_year_end ?>
        </div>
        <?php } ?>
        
        <?php if($filter->filter_english_level){ ?>
        <div class="col-sm-3">
            <h4>English Level</h4>
            <?php
            
                switch($filter->filter_english_level){
                    case \common\models\Student::ENGLISH_WEAK:
                        echo Yii::t('register', 'Weak');
                        break;
                    case \common\models\Student::ENGLISH_FAIR:
                        echo Yii::t('register', 'Fair');
                        break;
                    case \common\models\Student::ENGLISH_GOOD:
                        echo Yii::t('register', 'Good');
                        break;
                }
            ?>
        </div>
        <?php } ?>
        
    
        <?php if($filter->filter_transportation){ ?>
        <div class="col-sm-3">
            <h4>Transportation</h4>
            <?= "Yes" ?>
        </div>
        <?php } ?>
    
        <?php if($filter->universities){ ?>
        <div class="col-sm-3">
            <h4>Universities</h4>
            <ul>
                <?php
                foreach($filter->universities as $university){
                    $link = Url::to(['university/view', 'id' => $university->university_id]);
                    echo "<li><a href='$link' target='_blank'>".$university->university_name_en."</a></li>";
                }
                ?>
            </ul>
        </div>
        <?php } ?>
        
        <?php if($filter->majors){ ?>
        <div class="col-sm-3">
            <h4>Majors</h4>
            <ul>
                <?php
                foreach($filter->majors as $major){
                    $link = Url::to(['major/view', 'id' => $major->major_id]);
                    echo "<li><a href='$link' target='_blank'>".$major->major_name_en."</a></li>";
                }
                ?>
            </ul>
        </div>
        <?php } ?>
        
        <?php if($filter->languages){ ?>
        <div class="col-sm-3">
            <h4>Languages</h4>
            <ul>
                <?php
                foreach($filter->languages as $language){
                    $link = Url::to(['language/view', 'id' => $language->language_id]);
                    echo "<li><a href='$link' target='_blank'>".$language->language_name_en."</a></li>";
                }
                ?>
            </ul>
        </div>
        <?php } ?>
        
        <?php if($filter->countries){ ?>
        <div class="col-sm-3">
            <h4>Nationalities</h4>
            <ul>
                <?php
                foreach($filter->countries as $nationality){
                    $link = Url::to(['country/view', 'id' => $nationality->country_id]);
                    echo "<li><a href='$link' target='_blank'>".$nationality->country_nationality_name_en."</a></li>";
                }
                ?>
            </ul>
        </div>
        <?php } ?>
        
    </div>
 <?php } ?>
    
    <?php if(!($model->job_status == Job::STATUS_CLOSED || $model->job_status == Job::STATUS_DRAFT)){ ?>
        <a href="<?= Url::to(['job/display-reach', 'id' => $model->job_id]) ?>" class="btn btn-warning btn-block">View Job Reach</a>
        <a href="<?= Url::to(['job/edit-job-filter', 'id' => $model->job_id]) ?>" class="btn btn-danger btn-block">Edit Job Filter</a>
    <?php } ?>
</div>
