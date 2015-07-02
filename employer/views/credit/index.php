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

paymentBtn.click(function(){
    $(this).addClass('disabled');
});
";

/**
 * Mobile Select Functionality
 */
$js .= '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}
';

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
                
                <div class="radioer">
                    <input required type="radio" name="paymentOption" id="option2" value="<?= \common\models\PaymentType::TYPE_CREDITCARD ?>">
                    <label for="option2"><?= $this->params['isArabic']?"بطاقة إئتمان":"Credit card" ?></label>
                </div>
                
                <div class="checkboxer" style='margin-top:1em;'>
                    <input type="checkbox" value="1" id="terms" name="terms">
                    <label for="terms"><?= Yii::t("employer", "I agree to the <a href='{url}' target='_blank'>terms & conditions</a> of StudentHub", [
                        'url'=> Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/terms'])])?>
                    </label>
                </div>
                
                <?= Html::submitButton(Yii::t('employer', 'Make Payment') , [
                            'class' => 'btn btn-primary btn-block btn-ripple disabled',
                            'id' => 'makePayment',
                            'style' => 'margin-top: 7px;',
                        ]) ?>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>
