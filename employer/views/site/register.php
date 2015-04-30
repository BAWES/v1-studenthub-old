<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Employer;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\Employer */

$this->title = 'Register as an Employer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('employer', 'Sign up and start recruiting today!') ?></h4>
        </div>
    </div>

    <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
                        'horizontalCssClasses' => [
                            'label' => 'col-md-3',
                            'offset' => '',
                            'wrapper' => 'col-md-5',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
        ]);
        ?>


        <?= $form->field($model, 'employer_email')->textInput(['placeholder' => 'email@company.com']) ?>
        <?= $form->field($model, 'employer_password_hash')->passwordInput(['placeholder' => '***']) ?>
        <?= $form->field($model, 'employer_company_name') ?>
        <?= $form->field($model, 'employer_contact_firstname') ?>
        <?= $form->field($model, 'employer_contact_lastname') ?>
        
        <?= $form->field($model, 'employer_email_preference',[
                'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class=''>\n<div class=''>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
            ])->dropDownList([
                Employer::NOTIFICATION_DAILY => "Daily when students apply",
                Employer::NOTIFICATION_WEEKLY => "Weekly Summary",
                Employer::NOTIFICATION_OFF => "Off",
            ], ['class' => 'selectpicker', 'data-width' => 'auto']) ?>
        
        <?= $form->field($model, 'city_id',[
                'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class=''>\n<div class=''>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
            ])->dropDownList(ArrayHelper::map(common\models\City::find("country_id=84")->all(), "city_id", "city_name_en"), [
                'class' => 'selectpicker',
                'data-live-search' => 'true',
                'data-width' => 'auto'
            ]) ?>

        
        <div class="form-group">
            <br/>
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
