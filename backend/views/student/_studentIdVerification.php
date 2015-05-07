<?php
use yii\helpers\Html;
/* @var $model common\models\Student */
?>

<?= Html::a(Html::encode($model->student_id), ['view', 'id' => $model->student_id]) ?> - <?= $model->student_firstname ?>