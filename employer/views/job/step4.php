<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model employer\models\Job */

$this->title = Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;

$pricePerApplicant = \common\models\Note::findOne(["note_name" => "pricePerApplicant"])->note_value;
$pricePerPremiumFilter = \common\models\Note::findOne(["note_name" => "pricePerPremiumFilter"])->note_value;
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

        <div class="col-md-5">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><?= Yii::t("employer", "Max Applicants") ?></td>
                        <td><?= Yii::$app->formatter->asInteger($model->job_max_applicants) ?></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t("employer", "Cost Per Applicant") ?></td>
                        <td><?= Yii::$app->formatter->asDecimal($pricePerApplicant + $pricePerPremiumFilter *  $model->filter->premiumFilterCount, 3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>
                    <tr>
                        <td><?= Yii::t("employer", "Premium Filters") ?></td>
                        <td><?= Yii::$app->formatter->asInteger($model->filter->premiumFilterCount) ?></td>
                    </tr>
                    <tr class="warning">
                        <td><?= Yii::t("employer", "Total Price") ?></td>
                        <td><?= Yii::$app->formatter->asDecimal(($pricePerApplicant + $pricePerPremiumFilter *  $model->filter->premiumFilterCount) * $model->job_max_applicants,3) ?> <?= Yii::t("employer", "KD") ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>