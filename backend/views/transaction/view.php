<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transaction */

$this->title = "Transaction #".$model->transaction_id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= Html::a("View Job", ["job/view", "id"=>$model->job_id],['target' => '_blank', 'class' => 'btn btn-primary']) ?>
    <?= Html::a("View Employer", ["employer/view", "id"=>$model->job->employer_id],['target' => '_blank', 'class' => 'btn btn-primary']) ?>
    
    <br/><br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transaction_id',
            'job.employer.employer_company_name',
            'job.job_title',
            'transaction_number_of_applicants',
            'transaction_price_per_applicant:currency',
            'transaction_price_total:currency',
            'transaction_datetime:datetime',
        ],
    ]) ?>

</div>
