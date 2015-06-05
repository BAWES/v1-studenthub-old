<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Payment */

$this->title = "Payment #".$model->payment_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= Html::a("View Job", ["job/view", "id"=>$model->job_id],['target' => '_blank', 'class' => 'btn btn-primary']) ?>
    <?= Html::a("View Employer", ["employer/view", "id"=>$model->employer_id],['target' => '_blank', 'class' => 'btn btn-primary']) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_id',
            'payment_type_id',
            'employer_id',
            'job_id',
            'payment_job_num_applicants',
            'payment_job_num_filters',
            'payment_job_initial_price_per_applicant:currency',
            'payment_job_filter_price_per_applicant:currency',
            'payment_job_total_price_per_applicant:currency',
            'payment_total:currency',
            'payment_note:ntext',
            'payment_employer_credit_before:currency',
            'payment_employer_credit_change:currency',
            'payment_employer_credit_after:currency',
            'payment_datetime:datetime',
        ],
    ]) ?>

</div>
