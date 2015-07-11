<?php

use yii\helpers\Url;
use common\models\Employer;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Account Settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">

    <div class="panel-body">

        <div class="row">
            
            <div class="col-sm-6">
                <h3><?= Yii::t("frontend", "Account Information") ?></h3>
                <ul>
                    <li>
                        <a href="<?= Url::to(['setting/update-personal-info']) ?>"><?= Yii::t('register', 'Update Personal Information') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/update-company-info']) ?>"><?= Yii::t('register', 'Update Company Information') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/update-social-details']) ?>"><?= Yii::t('register', 'Update Social Media Details') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/update-logo']) ?>"><?= Yii::t('register', 'Update Company Logo') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/change-password']) ?>"><?= Yii::t('register', 'Change Password') ?></a>
                    </li>
                </ul>    
            </div>
            
            <div class="col-sm-6">
                <h3><?= Yii::t("frontend", "Notification Preferences") ?></h3>
                <ul>
                    <li>
                        <?php
                        $form = ActiveForm::begin([
                                'id' => 'notificationForm', 
                                'action' => ['setting/change-notification-preference'],
                            ]); 
                        ?>

                            <?= $form->field(Yii::$app->user->identity, 'employer_email_preference')->dropDownList([
                                Employer::NOTIFICATION_DAILY => Yii::t('register', "Daily when students apply"),
                                Employer::NOTIFICATION_WEEKLY => Yii::t('register', "Weekly Summary"),
                                Employer::NOTIFICATION_OFF => Yii::t('register', "Off"),
                            ], ['class' => 'selectpicker', 'data-width' => 'auto']) ?>


                        <?php ActiveForm::end(); ?>
                    </li>                                                    
                </ul>
            </div>
            


        </div>
    </div>
</div>