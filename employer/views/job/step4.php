<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model employer\models\Job */

$this->title = Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;
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
        $amountDue = $model->listingCost - Yii::$app->user->identity->employer_credit;
        if ($amountDue < 0)
            $amountDue = 0;
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
                                  data-placement="right" title="" data-original-title="<?= Yii::t("employer", "You may purchase credit in advance for faster job posting") ?>">?</span>
                        </td>
                        <td><?= Yii::$app->formatter->asDecimal(Yii::$app->user->identity->employer_credit, 3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>

                </tbody>
            </table>
        </div>



        <div class="col-md-4 col-md-offset-1 ">
            <h4 style="margin-bottom:0;"><?= Yii::t("employer", "Amount Due") ?></h4>
            <h3 style="margin-top:0; font-weight:bold;"><?= Yii::$app->formatter->asDecimal($amountDue, 3) ?> <?= Yii::t("employer", "KD") ?></h3>

            <form method="post">
                <?php
                if($amountDue > 0){
                    $paymentTypes = \common\models\PaymentType::find()->where("payment_type_id != 1")->all();
                    $i = 0;
                    foreach($paymentTypes as $type){
                        $i++;
                ?>
                    <div class="radioer">
                        <input type="radio" name="paymentOption" id="options<?=$i?>" value="<?= $type->payment_type_name_ar ?>" <?= $i==1?"checked=''":"" ?>>
                        <label for="option<?=$i?>"><?= $this->params['isArabic']?$type->payment_type_name_ar:$type->payment_type_name_en ?></label>
                    </div>
                <?php } 
                }
                ?>
                <input type="submit" value="<?= Yii::t("employer", "Make Payment") ?>" class="btn btn-primary btn-block btn-ripple" style="margin-top:7px;"/>
            </form>
        </div>

    </div>

</div>