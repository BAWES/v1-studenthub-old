<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Payment;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4 style="margin-top:0; margin-bottom: 1em">Total: <em><?= Payment::total() ?> KD</em></h4>
    
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'payment_id',
            'employer.employer_company_name',
            'paymentType.payment_type_name_en',
            'payment_amount:currency',
            'payment_note',
            'payment_datetime:datetime',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
