<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_title?$model->job_title:"Draft";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employer->employer_company_name, 'url' => ['employer/view', 'id' => $model->employer_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

    <div class="jumbotron">
        <h1><?= $this->title ?> 
        </h1>

        <p class="lead"><?= Html::a($model->employer->employer_company_name, ['employer/view', 'id'=>$model->employer->employer_id],['target' => '_blank']) ?>
            <br/>Status: <em><?= $model->jobStatus ?></em>
        </p>
    </div>

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
            'job_updated_datetime:datetime',
            'job_created_datetime:datetime',
        ],
    ]) ?>
    
    <hr/>
    
    <h2>Transactions</h2>
    <?php
    $transactionDataProvider = new ActiveDataProvider([
            'query' => $model->getTransactions()->orderBy("transaction_datetime DESC"),
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $transactionDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'transaction_number_of_applicants',
            'transaction_price_per_applicant:currency',
            'transaction_price_total:currency',
            'transaction_datetime:datetime',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'transaction', 'template' => '{view}'],
        ],
    ]); ?>
    
   <hr/>
    
<?php if($model->filter){ $filter = $model->filter; ?>
    <h2>Filters Applied</h2>
    
    <div class="row" style="margin-bottom:1em;">
        <div class="col-sm-3">
            <h4>Degree</h4>
            <?php
            if($filter->degree){
                echo $filter->degree->degree_name_en;
            }else echo "Degree filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>GPA</h4>
            <?php
            if($filter->filter_gpa){
                echo $filter->filter_gpa;
            }else echo "GPA filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>Graduation Year</h4>
            <?php
            if($filter->filter_graduation_year_start){
                echo $filter->filter_graduation_year_start." - ".$filter->filter_graduation_year_end;
            }else echo "Graduation filter not applied";
            ?>
        </div>
        
        <div class="col-sm-3">
            <h4>English Level</h4>
            <?php
            if($filter->filter_english_level){
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
            }else echo "GPA filter not applied";
            ?>
        </div>
    </div>
    
    <div class="row" style="margin-bottom:1em;">
        <div class="col-sm-3">
            <h4>Transportation</h4>
            <?php
            if($filter->filter_transportation){
                echo "Yes";
            }else echo "Transportation filter not applied";
            ?>
        </div>
    </div>
    
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
