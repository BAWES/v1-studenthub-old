<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\IndustrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Industries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Industry'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'industry_id',
            
            'industry_name_en',
            'employerCount',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>

</div>
