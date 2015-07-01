<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CybersourcePaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cybersource Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cybersource-payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'payment_id',
            'employer.employer_company_name',
            //'job_id',
            //'payment_track_uuid',
            //'payment_first_name',
            // 'payment_last_name',
            // 'payment_email:email',
            // 'payment_phone',
            // 'payment_country',
            // 'payment_card_number',
            // 'payment_card_expiry',
            'payment_amount',
            'payment_message:ntext',
            'payment_decision',
            'payment_reason_code',
            // 'payment_auth_code',
            // 'payment_signature',
            'payment_datetime:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
