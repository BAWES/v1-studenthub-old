<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PaymentType */

$this->title = $model->payment_type_name_en;
$this->params['breadcrumbs'][] = ['label' => 'Payment Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'payment_type_name_en',
            'payment_type_name_ar',
            'paymentCount',
        ],
    ]) ?>

</div>
