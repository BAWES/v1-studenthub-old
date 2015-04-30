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

$css = "
div.required label:after {
    content: ' *';
    color: red;
}";
$this->registerCss($css);
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
        
        <h3><?= Yii::t('register', "Company Details") ?></h3>
        
        <?= $form->field($model, 'employer_company_name')->textInput(['placeholder' => Yii::t('register', 'Company Name')]) ?>
        <?= $form->field($model, 'employer_website')->input("url", ['placeholder' => 'http://yourwebsite.com']) ?>
        <?= $form->field($model, 'city_id',[
                'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class=''>\n<div class=''>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
            ])->dropDownList(
                ArrayHelper::map(common\models\City::find("country_id=84")->all(), "city_id", 
                        $this->params['isArabic']?"city_name_ar":"city_name_en"), [
                'class' => 'selectpicker',
                'data-live-search' => 'true',
                'data-width' => 'auto'
            ]) ?>
        <?= $form->field($model, 'industry_id',[
                'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class=''>\n<div class=''>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
            ])->dropDownList(
                ArrayHelper::map(common\models\Industry::find()->all(), "industry_id", 
                        $this->params['isArabic']?"industry_name_ar":"industry_name_en"), [
                'class' => 'selectpicker',
                'data-live-search' => 'true',
                'data-width' => 'auto'
            ]) ?>
        <?= $form->field($model, 'employer_logo')->widget(kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                'browseLabel' =>  Yii::t('register', 'Upload Logo (Optional)')
            ],
        ]) ?>
        <?= $form->field($model, 'employer_num_employees')->input("number", ['placeholder' => Yii::t('register', 'Average # of Employees')]) ?>
        <?= $form->field($model, 'employer_company_desc')->textarea([
            'class' => 'form-control js-auto-size',
            'rows' => 1,
            'placeholder' => Yii::t('register', "Describe your company")
            ]) ?>
        
        
        <br/>
        <h3><?= Yii::t('register', "User Details") ?></h3>


        <?= $form->field($model, 'employer_email_preference',[
                'template' => "{label}\n{beginWrapper}\n"
                                        . "<div class=''>\n<div class=''>\n"
                                        . "{input}"
                                        . "</div>\n</div>\n{hint}\n{error}\n"
                                    . "{endWrapper}",
            ])->dropDownList([
                Employer::NOTIFICATION_DAILY => Yii::t('register', "Daily when students apply"),
                Employer::NOTIFICATION_WEEKLY => Yii::t('register', "Weekly Summary"),
                Employer::NOTIFICATION_OFF => Yii::t('register', "Off"),
            ], ['class' => 'selectpicker', 'data-width' => 'auto']) ?>
        <?= $form->field($model, 'employer_contact_firstname')->textInput(['placeholder' => Yii::t('register', 'First Name')]) ?>
        <?= $form->field($model, 'employer_contact_lastname')->textInput(['placeholder' => Yii::t('register', 'Last Name')]) ?>
        <?= $form->field($model, 'employer_email')->input('email', ['placeholder' => 'email@company.com']) ?>
        <?= $form->field($model, 'employer_password_hash')->passwordInput(['placeholder' => '***']) ?>
        
        
        <div class="form-group">
            <br/>
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
