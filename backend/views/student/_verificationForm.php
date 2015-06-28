<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $verifyIdForm backend\models\VerifyIdForm */
?>

<?php
//Load this form only if the user has not verified yet
if($model->student_id_verification == common\models\Student::ID_NOT_VERIFIED){
?>
<div class="row" style="background:#eee; padding-bottom:1em;">
    <h2 style="padding-left:1em;">ID Verification Required</h2>

    <div class="col-md-6">
        <?= Html::a(Html::img($model->verificationAttachment,['style'=>'max-height:400px']), $model->verificationAttachment,[
            'target' => '_blank'
        ]) ?>
    </div>
    <div class="col-md-6">
    <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]); ?>
        
    <h3>
        <?= $model->university->university_name_en ?>
    </h3>

    <?= $form->field($verifyIdForm, 'idNumber') ?>

    <div class="form-group">
        <?= Html::submitButton('Verify Student ID', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>

<?php } ?>