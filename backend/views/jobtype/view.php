<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jobtype */

$this->title = $model->jobtype_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobtypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobtype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->jobtype_id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jobtype_id',
            'jobtype_name_en',
            'jobtype_name_ar',
        ],
    ]) ?>

</div>
