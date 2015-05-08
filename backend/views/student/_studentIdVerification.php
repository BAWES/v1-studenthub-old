<?php
use yii\helpers\Html;
/* @var $model common\models\Student */
?>


<?= Html::a(Html::encode($model->student_firstname." ".$model->student_lastname), ['view', 'id' => $model->student_id]) ?>
