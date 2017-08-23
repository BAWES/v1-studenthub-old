<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployerOfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employer Offices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="employer-office-index">
                <div class="clearfix">
                    <div class="pull-left">
                        <h1><?= Html::encode($this->title) ?></h1>
                    </div>
                    <div class="pull-right">
                        <?= Html::a(Yii::t('app', 'Create Employer Office'), ['create'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'city.city_name_en',
                                'office_name_en',
                                'office_name_ar',
                                // 'office_longitude',
                                // 'office_latitude',
                                // 'office_address:ntext',
                                // 'office_created_at',
                                // 'office_updated_at',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
