<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Transaction;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4 style="margin-top:0; margin-bottom: 1em">Total: <em><?= Transaction::total() ?> KD</em></h4>
    
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'transaction_id',
            'job.employer.employer_company_name',
            'job.job_title',
            'transaction_number_of_applicants',
            'transaction_price_per_applicant:currency',
            'transaction_price_total:currency',
            'transaction_datetime:datetime',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
