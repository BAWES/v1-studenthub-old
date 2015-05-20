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
            'employer_updated_datetime',
            'employer_datetime',
        ],
    ]) ?>
    
    <hr/>
    
    <div class="row">
        <div class="col-sm-6">
            <h3>Payments <span class="badge">Total: <?= Yii::$app->formatter->asCurrency($model->paymentsTotal) ?></span></h3>
            <ul>
                <?php
                $payments = $model->payments;
                foreach($payments as $payment){
                    echo "<li>".Html::a($payment->payment_amount." KD on ".Yii::$app->formatter->asDatetime($payment->payment_datetime), 
                    ["payment/view", "id" => $payment->payment_id], ['target'=>'_blank'])."</li>";
                }
                ?>
            </ul>
        </div>
        <div class="col-sm-6">
            <h3>Transactions <span class="badge">Total: <?= Yii::$app->formatter->asCurrency($model->transactionsTotal) ?></span></h3>
            <ul>
                <?php
                $transactions = $model->transactions;
                foreach($transactions as $transaction){
                    echo "<li>".Html::a($transaction->transaction_price_total." KD on ".Yii::$app->formatter->asDatetime($transaction->transaction_datetime), 
                    ["transaction/view", "id" => $transaction->transaction_id], ['target'=>'_blank'])."</li>";
                }
                ?>
            </ul>
        </div>
    </div>
    
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
            'job_created_datetime',
            'jobStatus',

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'job', 'template' => '{view}'],
        ],
    ]); ?>

</div>
