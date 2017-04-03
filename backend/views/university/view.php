<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\University */

$this->title = $model->university_name_en;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Universities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->university_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'university_name_en',
            'university_name_ar',
            'university_domain',
            'isVerificationRequired',
            'university_id_template',
            'university_logo',
            'university_graphic',
            'numberOfStudents',
            'numberOfVerifiedStudents',
            'dataSource',
        ],
    ]) ?>

</div>
