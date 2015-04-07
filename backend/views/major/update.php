<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Major */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Major',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->major_name_en, 'url' => ['view', 'id' => $model->major_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="major-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
