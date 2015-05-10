<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->job_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->job_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->job_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'job_id',
            'jobtype_id',
            'employer_id',
            'job_title',
            'job_pay',
            'job_startdate',
            'job_responsibilites',
            'job_other_qualifications',
            'job_desired_skill',
            'job_compensation',
            'job_question_1',
            'job_question_2',
            'job_max_applicants',
            'job_current_num_applicants',
            'job_status',
            'job_created_datetime',
            'job_price_per_applicant',
        ],
    ]) ?>

</div>
