<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Jobtype */

$this->title = Yii::t('app', 'Create Jobtype');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobtypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
