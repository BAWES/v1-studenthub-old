<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\widgets\ActiveForm */

$js = '
    
$("input[type=date]")
        .attr("type", "text")
        .daterangepicker({
            // Consistent format with the HTML5 picker
            showDropdowns: true,
            singleDatePicker: true,
            format: "YYYY/MM/DD",
    });

';

\employer\assets\DateRangeInputAsset::register($this);
$this->registerJs($js);
?>

<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jobtype_id')->dropDownList(ArrayHelper::map(common\models\Jobtype::find()->all(), "jobtype_id", "jobtype_name_en")) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_pay')->dropDownList(['1' => 'Yes', '0' => 'No']) ?>

    <?= $form->field($model, 'job_startdate')->input('date',['placeholder' => 'Leave blank to show "flexible start date"']) ?>

    <?= $form->field($model, 'job_responsibilites')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_other_qualifications')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_desired_skill')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'job_compensation')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_max_applicants')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
