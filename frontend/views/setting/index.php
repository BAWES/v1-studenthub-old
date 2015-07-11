<?php

use yii\helpers\Url;
use common\models\Student;
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
                        <a href="<?= Url::to(['setting/update-education-info']) ?>"><?= Yii::t('register', 'Update Education Information') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/update-personal-info']) ?>"><?= Yii::t('register', 'Update Personal Information') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/update-cv']) ?>"><?= Yii::t('register', 'Update CV Attachment') ?></a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['setting/change-profile-photo']) ?>"><?= Yii::t('register', 'Change Profile Photo') ?></a>
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

                        <?=
                        $form->field(Yii::$app->user->identity, 'student_email_preference')->dropDownList([
                            Student::NOTIFICATION_DAILY => Yii::t('register', "Daily as jobs are posted"),
                            Student::NOTIFICATION_WEEKLY => Yii::t('register', "Weekly Summary"),
                            Student::NOTIFICATION_OFF => Yii::t('register', "Off"),
                                ], ['class' => 'selectpicker', 'data-width' => 'auto'])
                        ?>
                        <?php ActiveForm::end(); ?>
                    </li>                                                    
                </ul>                                                   
            </div>
            


        </div>
    </div>
</div>