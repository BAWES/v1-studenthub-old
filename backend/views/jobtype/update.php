<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jobtype */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jobtype',
]) . ' ' . $model->jobtype_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobtypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jobtype_name_en, 'url' => ['view', 'id' => $model->jobtype_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jobtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
