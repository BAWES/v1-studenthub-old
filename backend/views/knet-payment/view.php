<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KnetPayment */

$this->title = $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Knet Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knet-payment-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_id',
            'employer_id',
            'job_id',
            'payment_amount:currency',
            'payment_result',
            'payment_trackid',
            'payment_postdate',
            'payment_tranid',
            'payment_auth',
            'payment_ref',
            'payment_udf1',
            'payment_udf2',
            'payment_udf3',
            'payment_udf4',
            'payment_udf5',
            'payment_datetime:datetime',
        ],
    ]) ?>

</div>
