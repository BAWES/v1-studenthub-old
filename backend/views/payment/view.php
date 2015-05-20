<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Payment */

$this->title = "Payment #".$model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_id',
            'employer.employer_company_name',
            'paymentType.payment_type_name_en',
            'payment_amount:currency',
            'payment_note',
            'payment_datetime',
            
        ],
    ]) ?>

</div>
