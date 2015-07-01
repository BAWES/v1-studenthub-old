<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CybersourcePayment */

$this->title = $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Cybersource Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cybersource-payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->payment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->payment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_id',
            'employer_id',
            'job_id',
            'payment_track_uuid',
            'payment_first_name',
            'payment_last_name',
            'payment_email:email',
            'payment_phone',
            'payment_country',
            'payment_card_number',
            'payment_card_expiry',
            'payment_amount',
            'payment_message:ntext',
            'payment_decision',
            'payment_reason_code',
            'payment_auth_code',
            'payment_signature',
            'payment_datetime:datetime',
        ],
    ]) ?>

</div>
