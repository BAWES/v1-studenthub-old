<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Industry',
]) . ' ' . $model->industry_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Industries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->industry_name_en, 'url' => ['view', 'id' => $model->industry_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="industry-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
