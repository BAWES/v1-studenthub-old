<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model employer\models\Job */

$this->title = Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;

$js = "
var paymentBtn = $('#makePayment');

$('#terms').change(function(){
    if(this.checked){
        paymentBtn.removeClass('disabled');
    }else paymentBtn.addClass('disabled');
});

paymentBtn.click(function(){
    $(this).addClass('disabled');
});
";
$this->registerJs($js);
?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t("employer", "Step 4: Review your listing") ?></h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="<?= Url::to(["job/update", "id" => $model->job_id]) ?>" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(1) ?></a></li>
                    <li class="step" id="step2"><a href="<?= Url::to(["job/create-step2", "id" => $model->job_id]) ?>" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(2) ?></a></li>
                    <li class="step" id="step3"><a href="<?= Url::to(["job/create-step3", "id" => $model->job_id]) ?>" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(3) ?></a></li>
                    <li class="step" id="step3"><a href="#fourthStep" class="btn btn-teal btn-ripple"><?= Yii::$app->formatter->asInteger(4) ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <h3 style="margin-top:0"><?= Yii::t("employer", "Order Summary") ?></h3>

        <?php
        $amountDue = $model->amountDue;
        ?>

        <div class="col-md-5">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><?= Yii::t("employer", "Max Applicants") ?></td>
                        <td><?= Yii::$app->formatter->asInteger($model->job_max_applicants) ?></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t("employer", "Cost Per Applicant") ?></td>
                        <td><?= Yii::$app->formatter->asDecimal($model->costPerApplicant, 3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>
                    <tr style="border-bottom: 2px solid black;">
                        <td><?= Yii::t("employer", "Premium Filters") ?></td>
                        <td><?= Yii::$app->formatter->asInteger($model->filter->premiumFilterCount) ?></td>
                    </tr>
                    <tr class="">
                        <td><?= Yii::t("employer", "Listing Cost") ?></td>
                        <td><?= Yii::$app->formatter->asDecimal($model->listingCost, 3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>
                    <tr class="warning">
                        <td>
                            <?= Yii::t("employer", "Current Credit") ?> 
                            <span style="cursor:help" class="label label-warning" data-toggle="tooltip" 
                                  data-placement=<?= $this->params['isArabic']?"left":"right" ?>
                                  title="" data-original-title="<?= Yii::t("employer", "You may purchase credit in advance for faster job posting") ?>">?</span>
                        </td>
                        <td><?= Yii::$app->formatter->asDecimal(Yii::$app->user->identity->employer_credit, 3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>

                </tbody>
            </table>
        </div>



        <div class="col-md-4 col-md-offset-1 ">
            <h4 style="margin-bottom:0;"><?= Yii::t("employer", "Amount Due") ?></h4>
            <h3 style="margin-top:0; font-weight:bold;"><?= Yii::$app->formatter->asDecimal($amountDue, 3) ?> <?= Yii::t("employer", "KD") ?></h3>

            <?php $form = ActiveForm::begin(); ?>
                <?php if($amountDue > 0){ ?>
                    <?php if(Yii::$app->params['knetEnabled']){ ?>
                        <div class="radioer">
                            <input required type="radio" name="paymentOption" id="option1" value="<?= \common\models\PaymentType::TYPE_KNET ?>" checked=''>
                            <label for="option1"><?= $this->params['isArabic']?"كي نت":"KNET" ?></label>
                        </div>
                    <?php } ?>
            
                    <?php if(Yii::$app->params['cybersourceEnabled']){ ?>
                        <div class="radioer">
                            <input required type="radio" name="paymentOption" id="option2" value="<?= \common\models\PaymentType::TYPE_CREDITCARD ?>">
                            <label for="option2"><?= $this->params['isArabic']?"بطاقة إئتمان":"Credit card" ?></label>
                        </div>
                    <?php } ?>
                <?php } ?>
            
            
                <div class="checkboxer" style='margin-top:1em;'>
                    <input type="checkbox" value="1" id="terms" name="terms">
                    <label for="terms">
                        <?= Yii::t("employer", "I agree to the <a href='{url}' target='_blank'>terms & conditions</a> and <a href='{urlPrivacy}' target='_blank'>privacy policy</a>", [
                        'url'=> Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/terms-conditions']),
                        'urlPrivacy'=> Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/privacy-policy'])])?>
                    </label>
                </div>

                <?= Html::submitButton(Yii::t('employer', 'Make Payment') , [
                    'class' => 'btn btn-primary btn-block btn-ripple disabled',
                    'id' => 'makePayment',
                    'style' => 'margin-top: 7px;',
                ]) ?>
            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>