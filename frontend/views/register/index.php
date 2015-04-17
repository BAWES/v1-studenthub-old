<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Registration');
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Registration');

use yii\helpers\Url;
?>
<div class="panel" id="mainPanel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Select your University</h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-primary btn-ripple">1</a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-white btn-ripple">2</a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple">3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body studentRegistration">

        <ul class="list-material has-hidden">
            <?php
            $othersId = 12;
            $universities = \common\models\University::find()->where('university_id != :othersId', [':othersId' => $othersId])->all();
            foreach ($universities as $university) {
                $universityLink = Url::to(['register/register', 'university' => $university->university_id]);
                ?>

                <li class="has-action-left">
                    <a href="<?= $universityLink ?>" class="hidden"><i class="ion-chevron-right"></i></a>
                    <a href="<?= $universityLink ?>" class="visible">
                        <div class="list-action-left">
                            <img src="<?= Url::to('@web/images/universities/' . $university->university_logo) ?>" class="face-radius" alt="">
                        </div>
                        <div class="list-content">
                            <span class="title"><?= $university->university_name_en ?></span>
                        </div>
                    </a>
                </li>

            <?php } ?>
        </ul>

        <div class="note note-primary note-top-striped" style="margin-top:1.5em">
            <h4>University not listed?</h4>
            <p style="margin-bottom:1em;">
                You may still sign up and our agents will get in touch with you for account activation.
            </p>
            <a href="<?= Url::to(['register/register', 'university' => $othersId]) ?>" class="btn btn-primary btn-lg btn-block btn-ripple" style="color:white; text-decoration:none;">Sign Up</a>
        </div>

    </div>
</div>