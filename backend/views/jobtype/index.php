<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jobtypes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobtype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jobtype'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            //'jobtype_id',
            'jobtype_name_en',
            'jobtype_name_ar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
