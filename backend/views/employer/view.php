<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */

$this->title = $model->employer_company_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-view">
    <div class="row">
        <div class="col-sm-3 col-md-2" style="text-align:center">
            <?= Html::img($model->logo,['style'=>'max-width:100%; max-height:250px;']) ?>
        </div>
        <div class="col-sm-9 col-md-10">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="row">
                <div class="col-sm-5">
                    <b>Name:</b> <?= $model->employer_contact_firstname. " ". $model->employer_contact_lastname ?></a>
                    <br/>
                    <b>Email:</b> <a href="mailto:<?= $model->employer_email ?>"><?= $model->employer_email ?></a>
                    <br/>
                    <b>Phone:</b> <?= $model->employer_contact_number ?>
                </div>
                <div class="col-sm-7">
                    <b>Language Preference:</b> <?= $model->employer_language_pref=="en-US"? "English" : "Arabic" ?>
                    <br/>
                    <b>Credit:</b> <?= $model->employer_credit ?> KD
                    <p style="margin-top:10px;">
                        <?= Html::a("Give Credit Gift", ['gift', 'id' => $model->employer_id], ['class' => 'btn btn-primary']) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr/>
    <h3>Additional Details</h3><br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'industry.industry_name_en',
            'city.city_name_en',
            'employer_website:url',
            'employer_company_desc:ntext',
            'employer_num_employees',
            'emailPreference',
            'emailVerificationStatus',
            'employer_updated_datetime:datetime',
            'employer_datetime:datetime',
        ],
    ]) ?>
    
    <hr/>
    
    
    
    
    <h3>Jobs</h3>
    <?php
    $jobDataProvider = new ActiveDataProvider([
            'query' => $model->getJobs()->orderBy("job_created_datetime DESC"),
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $jobDataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'job_title',
            'job_created_datetime:datetime',
            'jobStatus',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'job', 'template' => '{view}'],
        ],
    ]); ?>
    
    <hr/>
    
    <h3>Payments <span class="badge"><?= $model->paymentsTotal ?> KD</span></h3>
    
    <?php
    $paymentDataProvider = new ActiveDataProvider([
            'query' => $model->getPayments()->orderBy("payment_datetime DESC"),
        ]);
    ?>
    <?= GridView::widget([
        'dataProvider' => $paymentDataProvider,
        'columns' => [
            'payment_id',
            'paymentType.payment_type_name_en',
            'payment_total:currency',
            'payment_employer_credit_change:currency',
            'payment_datetime:datetime',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'payment', 'template' => '{view}'],
        ],
    ]); ?>
    
    <div class="row">
        <div class="col-md-4">
            <?= Html::a("Refund in Credits", ['refund', 'id' => $model->employer_id], [
                'class' => 'btn btn-primary btn-warning btn-block',
                ]) ?>
        </div>
    </div>

</div>
