<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */

$this->title = $model->employer_company_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employer_id',
            'industry_id',
            'city_id',
            'employer_company_name',
            'employer_logo',
            'employer_website',
            'employer_company_desc:ntext',
            'employer_num_employees',
            'employer_contact_firstname',
            'employer_contact_lastname',
            'employer_contact_number',
            'employer_credit',
            'employer_email_preference:email',
            'employer_email:email',
            'employer_email_verification',
            'employer_auth_key',
            'employer_password_hash',
            'employer_password_reset_token',
            'employer_language_pref',
            'employer_limit_email:email',
            'employer_updated_datetime',
            'employer_datetime',
        ],
    ]) ?>

</div>
