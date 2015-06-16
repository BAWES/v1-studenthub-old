<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */

$this->title = Yii::t("employer", 'Buy Credit');
$this->params['breadcrumbs'][] = $this->title;

$js = "
var paymentBtn = $('#makePayment');

$('#terms').change(function(){
    if(this.checked){
        paymentBtn.removeClass('disabled');
    }else paymentBtn.addClass('disabled');
});
";

$this->registerJs($js);
?>


<div class="row">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= Yii::t('employer', 'Current Credit') ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <h3><?= Yii::$app->formatter->asDecimal(Yii::$app->user->identity->employer_credit, 3) ?> <?= Yii::t("employer", "KD") ?></h3>
                <p><?= Yii::t("employer", "Buying credit allows you to post jobs quickly without having to go through payment processing.") ?></p>
            </div>

        </div>
    </div>
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= Yii::t('employer', 'Buy Credit') ?></h4>
                </div>
            </div>

            <div class="panel-body">


                <?php $form = ActiveForm::begin(['method' => 'post']); ?>

                <h4><?= Yii::t("employer", "How much credit would you like to purchase") ?></h4>
                <select class="selectpicker" name="creditPurchase" data-width="100%">
                    <option value='10'><?= Yii::$app->formatter->asInteger(10) ?> <?= Yii::t("employer", "KD") ?></option>
                    <option value='30'><?= Yii::$app->formatter->asInteger(30) ?> <?= Yii::t("employer", "KD") ?></option>
                    <option value='50'><?= Yii::$app->formatter->asInteger(50) ?> <?= Yii::t("employer", "KD") ?></option>
                    <option value='100'><?= Yii::$app->formatter->asInteger(100) ?> <?= Yii::t("employer", "KD") ?></option>
                    <option value='500'><?= Yii::$app->formatter->asInteger(500) ?> <?= Yii::t("employer", "KD") ?></option>
                    <option value='1000'><?= Yii::$app->formatter->asInteger(1000) ?> <?= Yii::t("employer", "KD") ?></option>
                </select>
                
                <h4 style='margin-top:1em; margin-bottom:0.6em;'><?= Yii::t("employer", "Payment Method") ?></h4>
                <div class="radioer">
                    <input required type="radio" name="paymentOption" id="option1" value="<?= \common\models\PaymentType::TYPE_KNET ?>" checked=''>
                    <label for="option1"><?= $this->params['isArabic']?"كي نت":"KNET" ?></label>
                </div>
                
                <div class="checkboxer" style='margin-top:1em;'>
                    <input type="checkbox" value="1" id="terms" name="terms">
                    <label for="terms"><?= Yii::t("employer", "I agree to the <a href='{url}' target='_blank'>terms & conditions</a> of StudentHub", [
                        'url'=> Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/terms'])])?>
                    </label>
                </div>
                
                <?= Html::submitButton(Yii::t('employer', 'Make Payment') , [
                            'class' => 'btn btn-primary btn-block btn-ripple ',
                            'id' => 'makePayment',
                            'style' => 'margin-top: 7px;',
                        ]) ?>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>
