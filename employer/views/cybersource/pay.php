<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\CybersourcePayment;

/* @var $this yii\web\View */
/* @var $payment common\models\CybersourcePayment */

$this->title = Yii::t("employer", 'Cybersource Payment');
$this->params['breadcrumbs'][] = $this->title;

$js = "

";

$this->registerJs($js);
?>


<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $this->title ?></h4>
        </div>
    </div>

    <div class="panel-body">
        <form id="payment_form" action="<?= CybersourcePayment::PAYMENT_URL ?>" method="post">
            
        </form>
    </div>

</div>
