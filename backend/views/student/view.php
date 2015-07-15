<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $verifyIdForm backend\models\VerifyIdForm */

$this->title = $model->student_firstname." ".$model->student_lastname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">
    <div class="row">
        <div class="col-sm-3 col-md-2" style="text-align:center">
            <?= Html::img($model->photo,['style'=>'max-width:100%; max-height:250px;']) ?>
        </div>
        <div class="col-sm-9 col-md-10">
            <h1><?= Html::encode($this->title) ?></h1>
            <b>Language Preference:</b> <?= $model->student_language_pref=="en-US"? "English" : "Arabic" ?>
            <br/>
            <b>Email:</b> <a href="mailto:<?= $model->student_email ?>"><?= $model->student_email ?></a>
            <br/>
            <b>Phone:</b> <?= $model->student_contact_number ?>
        </div>
    </div>
    
    <?php  echo $this->render('_verificationForm', ['model' => $model, 'verifyIdForm' => $verifyIdForm]); ?>
    
    <hr/>
    
    <div class="row">
        <div class="col-sm-6">
            <h3>Majors Studied</h3>
            <ul>
                <?php foreach($model->majors as $major){ ?>
                <li><?= $major->major_name_en ?> </li>
                <?php }?>
            </ul>
        </div>
        <div class="col-sm-6">
            <h3>Languages Spoken</h3>
            <ul>
                <?php foreach($model->languages as $language){ ?>
                <li><?= $language->language_name_en ?> </li>
                <?php }?>
            </ul>
        </div>
    </div>
    
    
    
    <hr/>
    <h3>Additional Details</h3><br/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id_number',
            'degree.degree_name_en',
            'country.country_name_en',
            'university.university_name_en',
            'student_dob:date',
            'student_enrolment_year',
            'student_graduating_year',
            'student_gpa',
            'englishLanguageLevel',
            'gender',
            'transportation',
            'emailVerificationStatus',
            'emailPreference',
            'student_updated_datetime:datetime',
            'student_datetime:datetime',
            'student_experience_company',
            'student_experience_position',
            'student_interestingfacts:ntext',
            'student_skill:ntext',
            'student_hobby:ntext',
            'student_club:ntext',
            'student_sport:ntext',
            'cv:url',
            'verificationAttachment:url',
        ],
    ]) ?>

</div>