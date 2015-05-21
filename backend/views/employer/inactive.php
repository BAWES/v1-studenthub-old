<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Inactive Employers";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>"Never made a transaction"</h3><br/>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'employer_company_name',
            'employer_contact_firstname',
            'employer_contact_lastname',
            'employer_contact_number',
            'employer_credit',
            //'employer_language_pref',
            'employer_datetime',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
