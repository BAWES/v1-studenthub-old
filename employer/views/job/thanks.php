<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $paymentId int */

$this->title = Yii::t('register', 'Thank You!');
$this->params['breadcrumbs'][] = Yii::t('register', 'Thank You!');
?>

<div class="card">
    <div class="panel-body" style="text-align:center;">
        <h1 style="font-size:60px"><?= Yii::t('register', 'Thank You!') ?></h1>
        <i class="fa fa-check-circle" style="font-size:200px; color:grey; margin-top:-20px; padding-bottom: 20px"></i>
        <p class="sub">
            <?= Yii::t('employer', 'You will receive your invoice by email.') ?><br/>
            <?= Yii::t('employer', 'Your post will be revised and we will notify you once it is posted.') ?>
        </p>

        <a href="<?= Url::to(['payment/view', 'id' => $paymentId]) ?>" class="btn btn-lg btn-success btn-ripple">
            <?= Yii::t('employer', 'View Invoice') ?>
        </a>
        <a href="<?= Url::to(['dashboard/index', '#' => 'tab_pendingJobs']) ?>" class="btn btn-lg btn-success btn-ripple">
            <?= Yii::t('employer', 'Return to Dashboard') ?>
        </a>
    </div>
</div>
