<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $employer common\models\Employer */
/* @var $payment common\models\Payment */

$this->title = "Refund";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $employer->employer_company_name, 'url' => ['view', 'id' => $employer->employer_id]];
$this->params['breadcrumbs'][] = "Refund";
?>
<div class="employer-gift">

    <h1><?= $this->title." to ".$employer->employer_company_name ?></h1>
        
    <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($payment, 'payment_employer_credit_change')->input('number', ['step' => 'any', 'placeholder' => 'Amount in KD']) ?>
    <?= $form->field($payment, 'payment_note')->textarea(['placeholder' => 'Reason for refund']) ?>
        
    <div class="form-group">
        <?= Html::submitButton("Process Refund", ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure you wish to refund?']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
