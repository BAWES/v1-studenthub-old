<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use common\models\Job;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_title ? $model->job_title : "Draft";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employer->employer_company_name, 'url' => ['employer/view', 'id' => $model->employer_id]];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['job/view', 'id' => $model->job_id]];
$this->params['breadcrumbs'][] = "Reach";

//Different formatting for each job status
$color = "";
switch ($model->job_status) {
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

    <h1>Job Reach</h1>
    
    <?php $qualifiedStudents = $model->getQualifiedStudents()->all() ?>

    <p style="font-size:1.5em;" >
    <?= $this->title ?> will reach <?= count($qualifiedStudents) ?> students
    </p>
    
    <ul style="margin-bottom:2em;">
        <?php foreach($qualifiedStudents as $student){ ?>
        <li>
            <a href="<?= Url::to(['student/view', 'id' => $student->student_id]) ?>" target="_blank">
                <?= $student->student_firstname . " " . $student->student_lastname ?>
            </a>
        </li>
        <?php } ?>
    </ul>
    
    <a href="<?= Url::to(['job/view', 'id' => $model->job_id]) ?>" class="btn btn-primary">Back to Job Details</a>

</div>
