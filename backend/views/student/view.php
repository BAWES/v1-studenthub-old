<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->student_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_id',
            'degree_id',
            'country_id',
            'university_id',
            'student_firstname',
            'student_lastname',
            'student_dob',
            'student_status',
            'student_enrolment_year',
            'student_graduating_year',
            'student_gpa',
            'student_english_level',
            'student_gender',
            'student_transportation',
            'student_contact_number',
            'student_interestingfacts:ntext',
            'student_photo',
            'student_cv',
            'student_skill:ntext',
            'student_hobby:ntext',
            'student_club:ntext',
            'student_sport:ntext',
            'student_experience_company',
            'student_experience_position',
            'student_verification_attachment',
            'student_email_verification:email',
            'student_id_verification',
            'student_id_number',
            'student_email_preference:email',
            'student_email:email',
            'student_auth_key',
            'student_password_hash',
            'student_password_reset_token',
            'student_language_pref',
            'student_banned',
            'student_limit_email:email',
            'student_updated_datetime',
            'student_datetime',
        ],
    ]) ?>

</div>
