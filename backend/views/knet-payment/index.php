<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KnetPaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Knet Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knet-payment-index">

    <h1><?= Html::encode($this->title) ?></h1><br/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'payment_id',
            'employer_id',
            'job_id',
            'payment_result',
            'payment_trackid',
            'payment_postdate',
            // 'payment_tranid',
            // 'payment_auth',
            // 'payment_ref',
            // 'payment_udf1',
            // 'payment_udf2',
            // 'payment_udf3',
            // 'payment_udf4',
            // 'payment_udf5',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
