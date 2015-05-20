<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Major */

$this->title = $model->major_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="major-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->major_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'major_name_en',
            'major_name_ar',
            'studentCount',
        ],
    ]) ?>

</div>
