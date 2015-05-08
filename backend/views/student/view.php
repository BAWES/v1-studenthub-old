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
    <?= Html::img($model->photo,['style'=>'width:150px; float:left; margin:15px;']) ?>
    <h1 style="padding-top:40px;"><?= Html::encode($this->title) ?></h1>
    <p>
        <b>Email:</b> <a href="mailto:<?= $model->student_email ?>"><?= $model->student_email ?></a>
        <br/>
        <b>Phone:</b> <?= $model->student_contact_number ?>
    </p>
    
    <br style="clear:both"/>
    <?php  echo $this->render('_verificationForm', ['model' => $model, 'verifyIdForm' => $verifyIdForm]); ?>
    
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
            'status',
            'student_enrolment_year',
            'student_graduating_year',
            'student_gpa',
            'englishLanguageLevel',
            'gender',
            'transportation',
            'student_experience_company',
            'student_experience_position',
            'emailVerificationStatus',
            'emailPreference',
            'student_language_pref',
            'student_updated_datetime:date',
            'student_datetime:date',
            'student_interestingfacts:ntext',
            'student_cv',
            'student_skill:ntext',
            'student_hobby:ntext',
            'student_club:ntext',
            'student_sport:ntext',
            'verificationAttachment:image',
        ],
    ]) ?>

</div>