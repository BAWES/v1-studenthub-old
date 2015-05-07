<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->student_firstname." ".$model->student_lastname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">
    <?= Html::img($model->photo,['style'=>'width:150px; float:left; margin:15px;']) ?>
    <h1 style="padding-top:40px;"><?= Html::encode($this->title) ?></h1>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'degree.degree_name_en',
            'country.country_name_en',
            'university.university_name_en',
            'student_dob',
            'status',
            'student_enrolment_year',
            'student_graduating_year',
            'student_gpa',
            'englishLanguageLevel',
            'gender',
            'transportation',
            'student_contact_number',
            'student_interestingfacts:ntext',
            'student_cv',
            'student_skill:ntext',
            'student_hobby:ntext',
            'student_club:ntext',
            'student_sport:ntext',
            'student_experience_company',
            'student_experience_position',
            'student_verification_attachment',
            'emailVerificationStatus',
            'idVerificationStatus',
            'student_id_number',
            'emailPreference',
            'student_email:email',
            'student_language_pref',
            'student_updated_datetime',
            'student_datetime',
        ],
    ]) ?>

</div>