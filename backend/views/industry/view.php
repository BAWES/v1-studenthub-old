<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Industry */

$this->title = $model->industry_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Industries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="industry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->industry_id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'industry_id',
            'industry_name_en',
            'industry_name_ar',
        ],
    ]) ?>

</div>
