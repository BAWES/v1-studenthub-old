<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

    <h1><?= $this->title?$this->title:"Draft" ?> @ 
        <?= Html::a($model->employer->employer_company_name, ['employer/view', 'id'=>$model->employer->employer_id],['target' => '_blank']) ?></h1>
    <h4 style="margin-top:0;">Status: <em><?= $model->jobStatus ?></em></h4>

    <br/>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->job_id], ['class' => 'btn btn-primary']) ?>
    </p>

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
            'job_price_per_applicant',
            'job_updated_datetime',
            'job_created_datetime',
        ],
    ]) ?>
    
    <hr/>
    
<?php if($model->filter){ $filter = $model->filter; ?>
    <h2>Filters Applied</h2>
    
    <div class="row">
        <div class="col-sm-3">
            <h4>Universities</h4>
            <?php
            if($filter->universities){
                echo "<ul>";
                foreach($filter->universities as $university){
                    $link = Url::to(['university/view', 'id' => $university->university_id]);
                    echo "<li><a href='$link' target='_blank'>".$university->university_name_en."</a></li>";
                }
                echo "</ul>";
            }else echo "University filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>Majors</h4>
            <?php
            if($filter->majors){
                echo "<ul>";
                foreach($filter->majors as $major){
                    $link = Url::to(['major/view', 'id' => $major->major_id]);
                    echo "<li><a href='$link' target='_blank'>".$major->major_name_en."</a></li>";
                }
                echo "</ul>";                
            }else echo "Major filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>Languages</h4>
            <?php
            if($filter->majors){
                echo "<ul>";
                foreach($filter->languages as $language){
                    $link = Url::to(['language/view', 'id' => $language->language_id]);
                    echo "<li><a href='$link' target='_blank'>".$language->language_name_en."</a></li>";
                }
                echo "</ul>";
            }else echo "Language filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>Nationalities</h4>
            <?php
            if($filter->countries){
                echo "<ul>";
                foreach($filter->countries as $nationality){
                    $link = Url::to(['country/view', 'id' => $nationality->country_id]);
                    echo "<li><a href='$link' target='_blank'>".$nationality->country_nationality_name_en."</a></li>";
                }
                echo "</ul>";
            }else echo "Nationality filter not applied";
            ?>
        </div>
    </div>
    
    
    
 <?php } ?>
</div>
