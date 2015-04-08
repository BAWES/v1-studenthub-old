<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Universities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create University'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'university_id',
            'university_name_en',
            'university_domain',
            'university_require_verify',
            // 'university_id_template',
            // 'university_logo',
            // 'university_graphic',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
