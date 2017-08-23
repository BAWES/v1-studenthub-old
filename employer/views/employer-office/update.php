<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmployerOffice */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Employer Office',
]) . $model->office_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employer Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->office_id, 'url' => ['view', 'id' => $model->office_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="panel">
    <div class="panel-body">
        <div class="">
            <div class="employer-office-update">
                <h1><?= Html::encode($this->title) ?></h1>

				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
            </div>
        </div>
    </div>
</div>
