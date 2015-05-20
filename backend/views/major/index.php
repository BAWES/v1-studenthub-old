<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MajorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Majors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="major-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'major_id',
            'major_name_en',
            'studentCount',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>

</div>
