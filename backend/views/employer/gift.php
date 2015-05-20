<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */
/* @var $payment common\models\Payment */

$this->title = "Give Credit Gift";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employer_company_name, 'url' => ['view', 'id' => $model->employer_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Give Credit Gift');
?>
<div class="employer-gift">

    <h1><?= $this->title." to ".$model->employer_company_name ?></h1>
        
    <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($payment, 'payment_amount')->input('number', ['step' => 'any', 'placeholder' => 'Amount in KD']) ?>
        
    <div class="form-group">
        <?= Html::submitButton("Send Credit Gift", ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>

</div>
