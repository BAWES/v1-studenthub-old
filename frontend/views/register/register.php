<?php
/* @var $this yii\web\View */
/* @var $university common\models\University */

$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";


$css = "
    .radioer input[type='radio'] + label { margin-right:10px !important; margin-top:0 !important;}
        
.inputer{width:250px; float:left; margin-left:10px; margin-right:10px;}
.input-wrapper{width:250px;}

.input-wrapper.huge, .inputer.huge{width:300px;}
.input-wrapper.baby, .inputer.baby{width:80px}
.input-wrapper.medz, .inputer.medz{width:150px}

.bootstrap-select{margin-left:4px !important; margin-right:5px !important;}
.selecter{width:300px !important;}

.questionRow p{margin-top:35px; margin-bottom:0; float:left;}

.additional{display:none; clear:both;}
br.clear{clear:both;}
        ";


$step0 = Yii::$app->urlManager->createUrl('register/index');
$step1 = Yii::$app->urlManager->createUrl('register/form');
$js = "
var step1 = '$step1';
var step2 = 'step1url';
var step3 = 'step1url';
";

$js .= '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selectpicker").selectpicker("mobile");
}

//AJAX load page into panel
var panel = $("#mainPanel");
function loadPage(page){
    $.ajax({
        cache: false,
        url: page,
        beforeSend: function () {
            panel.find(".panel-body").append("<div class=\"refresh-container\"><div class=\"loading-bar indeterminate\"></div></div>");
            panel.find(".alert").remove();
        }
    }).done(function (data) {
        //Show new content
        $(".panel-body form").hide().html(data).slideDown(1000);
        $(".panel-title h4").text("Complete your profile");
        $("#step2 a").removeClass("btn-primary").addClass("btn-white");
        $("#step3 a").removeClass("btn-white").addClass("btn-primary");
        
        //hide loader
        panel.find(".refresh-container").fadeOut(500, function () {
            panel.find(".refresh-container").remove();
        });

        //toastr.success("The content successfully loaded.");

    }).fail(function (jqXHR, textStatus) {
        panel.find(".refresh-container").fadeOut(500, function () {
            panel.find(".refresh-container").remove();
        });

        // Handle notification types
        toastr.error("There was a problem while loading the content.");       
    });
}


//Ajax Click Test
$("#formStep").click(function () {
    loadPage(step1);
    
    return false;
});
';

//Selectize plugin for multi-select
\frontend\assets\SelectizeAsset::register($this);

$this->registerCss($css);
$this->registerJs($js);
?>
<div class="panel" id="mainPanel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Sign up and find a job today!</h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-white btn-ripple">1</a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-primary btn-ripple">2</a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple">3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body studentRegistration">

        <form method="post">
            <h3>Registration</h3>
            
            <h4><?= $university->university_name_en ?></h4>
            
            
            <a href="#" id='formStep'>Test Ajax Loading</a>
        </form>
    </div>
</div>