<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $filter employer\models\Filter */

$this->title = Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t("employer", "Step 3: Choose which students can see your job listing") ?></h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="<?= Url::to(["job/update", "id" => $model->job_id]) ?>" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(1) ?></a></li>
                    <li class="step" id="step2"><a href="<?= Url::to(["job/create-step2", "id" => $model->job_id]) ?>" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(2) ?></a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-teal btn-ripple"><?= Yii::$app->formatter->asInteger(3) ?></a></li>
                    <li class="step" id="step3"><a href="#fourthStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(4) ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body">

        <?=
        $this->render('_formStep3', [
            'model' => $model,
            'filter' => $filter,
        ])
        ?>

    </div>

</div>