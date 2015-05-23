<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model employer\models\Job */
/* @var $published boolean */

$this->title = $published? Yii::t('employer', 'Edit your Job Opening') : Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $published? Yii::t("employer", "Edit Basic Job Details") : Yii::t("employer", "Step 1: Basic Details") ?></h4>
            <?php if(!$published){ ?>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-teal btn-ripple"><?= Yii::$app->formatter->asInteger(1) ?></a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(2) ?></a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(3) ?></a></li>
                    <li class="step" id="step3"><a href="#fourthStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(4) ?></a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="panel-body">

        <?=
        $this->render('_formStep1', [
            'model' => $model,
            'published' => $published,
        ])
        ?>

    </div>

</div>