<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmployerOffice */

$this->title = $model->office_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employer Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="employer-office-view">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a(Yii::t('app', 'Back'), ['employer/view','id'=>$model->employer_id], ['class' => 'btn btn-success']) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'city.city_name_en',
                        'office_name_en',
                        'office_name_ar',
                        'office_longitude',
                        'office_latitude',
                        'office_address:ntext',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
