<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmployerOffice */

$this->title = Yii::t('app', 'Create Employer Office');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employer Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-body">
        <div class="">
            <div class="employer-office-create">
                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
