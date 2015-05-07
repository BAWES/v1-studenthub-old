<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = nl2br(Html::encode($message));
?>
<div class="panel">
    
    <div class="panel-body">
        <div class="alert alert-danger">
            <?= $name ?>
        </div>
        <p>
            <?= Yii::t("app", "The above error occurred while the server was processing your request.") ?>
        </p>
        <p>
            <?= Yii::t("app", "Please contact us if you need any assistance. Thank you.") ?>
        </p>
    </div>
</div>