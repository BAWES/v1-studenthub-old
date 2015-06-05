<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = Yii::t('app', 'Create Industry');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Industries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
