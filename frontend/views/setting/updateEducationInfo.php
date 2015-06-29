<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\Student;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\Student */

$this->title = Yii::t('register', 'Update Education Information');
$this->params['breadcrumbs'][] = $this->title;

//Set Datepicker Locale to AR if language selected
$datePickerLocale = "";
if($this->params['isArabic']){
    $datePickerLocale = "
   locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Cancel',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة','السبت'],
            monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            firstDay: 1
        }     
";
}

$css = "
div.required label:after {
    content: ' *';
    color: red;
}";

$js = '
 $(".js-auto-size").textareaAutoSize();
 
$(".selectize-text").selectize({
    delimiter: ",",
    persist: false,
    createOnBlur: true,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});
        
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}else{
    $("input[type=date]")
        .attr("type", "text")
        .daterangepicker({
            // Consistent format with the HTML5 picker
            showDropdowns: true,
            singleDatePicker: true,
            format: "YYYY/MM/DD",
            '.$datePickerLocale.'
        });
}
';

//Register daterange picker
\frontend\assets\RegistrationAsset::register($this);


$this->registerJs($js);
$this->registerCss($css);
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $this->title ?></h4>
        </div>
    </div>

    <div class="panel-body">
        <?php
        //English Field Templates
        $fieldTemplate = "{label}\n{beginWrapper}\n"
                        . "<div class='inputer'>\n<div class='input-wrapper'>\n"
                        . "{input}"
                        . "</div>\n</div>\n{hint}\n{error}\n"
                        . "{endWrapper}";
        $selectizeTemplate = "{label}\n{beginWrapper}\n"
                        . "<div class=''>\n<div class=''>\n"
                        . "{input}"
                        . "</div>\n</div>\n{hint}\n{error}\n"
                        . "{endWrapper}";
        
        $selectTemplate = "{label}\n{beginWrapper}\n"
                        . "<div class=''>\n<div class=''>\n"
                        . "{input}"
                        . "</div>\n</div>\n{hint}\n{error}\n"
                        . "{endWrapper}";
        
        
        /**
         * Start Form
         */
        $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'layout' => 'horizontal',
                    'options' => ['enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => $fieldTemplate,
                        'horizontalCssClasses' => [
                            'label' => 'col-md-3',
                            'offset' => '',
                            'wrapper' => "col-md-5",
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
        ]);
        ?>
        
        <?= $form->field($model, 'university_id')->textInput([
            'disabled' => 'disabled',
            'value' => $this->params['isArabic']?$model->university->university_name_ar:$model->university->university_name_en,
            'data-toggle' => 'tooltip',
            'data-placement' => 'bottom',
            'data-original-title' => Yii::t('register', 'Please contact us if you transferred universities'),
            ]) ?>
        
        <?= $form->field($model, 'degree_id', ['template' => $selectTemplate])->dropDownList(
                ArrayHelper::map(common\models\Degree::find()->all(), "degree_id", $this->params['isArabic'] ? "degree_name_ar" : "degree_name_en"), [
                    'class' => 'selectpicker', 
                    'data-width' => 'auto',
                    ]) ?>
        
        
        <br/>
        
        <div class="col-md-5 col-md-offset-3">
            <?= Html::submitButton(Yii::t('register', 'Update Education Information'), [
                'class' => 'btn btn-success btn-block btn-ripple', 
                'name' => 'signup-button',
                ]) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>