<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-type-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'payment_type_name_en',
            'paymentCount',
            'totalPayments:currency',
            'totalCreditChange:currency',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
