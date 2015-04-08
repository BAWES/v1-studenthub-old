<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\University */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'University',
]) . ' ' . $model->university_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Universities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->university_name_en, 'url' => ['view', 'id' => $model->university_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="university-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
