<?php
/* @var $this yii\web\View */
/* @var $university common\models\University */

use yii\helpers\Url;

$this->title = Yii::t('register', 'Registration');
$this->params['breadcrumbs'][] = Yii::t('register', 'Registration');


$css = "
    .radioer input[type='radio'] + label { margin-top:0 !important;}
        
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


$formLink = Yii::$app->urlManager->createUrl('register/validate');
$idLink = Yii::$app->urlManager->createUrl('register/id-upload');
$cvUploadLink = Yii::$app->urlManager->createUrl('register/cv-upload');
$photoUploadLink = Yii::$app->urlManager->createUrl('register/photo-upload');
$step1 = Yii::$app->urlManager->createUrl('register/form');

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

$js = "
var step1 = '$step1';
var idLink = '$idLink';
var cvLink = '$cvUploadLink';
var photoLink = '$photoUploadLink';
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


//File upload monitor for ID uploads
var $fileUpload = $("#fileUpload");
var requiresIdUpload = $fileUpload.length?true:false;

//Boolean values, will be set to true if any requires to be uploaded (changed by upload monitor)
var notUploaded = false;
var notUploadedCV = false;
var notUploadedPhoto = false;

var file; //html5 storage of the ID file on selection
var cvFile; //Html5 storage of the CV file
var photoFile; //Html5 storage of the photo file

if(requiresIdUpload){
    //Store file in variable
    $fileUpload.on("change", function(event){
        var files = event.target.files;
        if(files && files.length > 0){
            file = event.target.files[0];
            notUploaded = true;
        }else notUploaded = false;
    });
}


//Form Submit Step 1
$("#nextStep").click(function () {
    var $myForm = $("#registerForm");

    //Trigger browser-based validation
    if(!$myForm[0].checkValidity()){
        $($myForm).find(":submit").click();
    }
    
    //Scroll to top and start loading
    $("html, body").animate({
        scrollTop: 0
    }, 250);
    
    //If form requires upload, upload and validate it before the rest of form
    if (requiresIdUpload && notUploaded){
        //Upload and validate file
        var data = new FormData();
        data.append("idUpload", file);
        
        uploadToServer(data, idLink, $myForm, $("#idUpload"), 1, true, function(){});
    }
    else if(notUploadedCV && notUploadedPhoto){
        //Upload both CV and Photo together
        var cvData = new FormData();
        cvData.append("cvUpload", cvFile);
        
        var photoData = new FormData();
        photoData.append("photoUpload", photoFile);
        
        //Upload photo without validation
        uploadToServer(photoData, photoLink, $myForm, $("#photoData"), 3, false, function(){
            //Upload cv with validation
            uploadToServer(cvData, cvLink, $myForm, $("#cvData"), 2, true, function(){});
        });
    }
    else if(notUploadedCV){
        //Replicate ID upload thingy for CV
        var data = new FormData();
        data.append("cvUpload", cvFile);
        
        uploadToServer(data, cvLink, $myForm, $("#cvData"), 2, true, function(){});
    }
    else if(notUploadedPhoto){
        //Replicate ID upload thingy for Photo
        var data = new FormData();
        data.append("photoUpload", photoFile);
        
        uploadToServer(data, photoLink, $myForm, $("#photoData"), 3, true, function(){});
    }
    else{
        //file upload not required, proceed with validation
        validateForm($myForm);
    }
    
    return false;
});

//File Upload Function
function uploadToServer(fileData, requestUrl, theForm, targetHiddenInput, uploadRef, validate, callback){
    
    $.ajax({
            url: requestUrl,
            type: "POST",
            data: fileData,
            cache: false,
            beforeSend: function () {
                showLoading();
            },
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response, textStatus, jqXHR)
            {                
                //If there are errors, show on top
                if(response.errors){
                    var errors = response.errors;

                    $.each(errors, function() {
                        $.each(this, function(key, value) {
                            $(".panel-body form").prepend("<div class=\"alert alert-danger\" role=\"alert\">"
                            + "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">"
                            + "<span aria-hidden=\"true\">×</span><span class=\"sr-only\">Close</span></button>"
                            + value 
                            + "</div>");
                        });
                    });
                    hideLoading();
                }else if(response.file){
                    //console.log(response.file);
                    //file uploaded
                    targetHiddenInput.val(response.file);
                    
                    //On upload success set notUploaded to false
                    //This way we will not repeat the upload unless the file is changed
                    switch(uploadRef){
                        case 1:
                            notUploaded = false;
                            break;
                        case 2:
                            notUploadedCV = false;
                            break;
                        case 3:
                            notUploadedPhoto = false;
                            break;
                    }
                    
                    //Execute the callback
                    callback();
                    
                    //validate form after file uploaded
                    if(validate){
                        validateForm(theForm);
                    }
                }
                
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
        });
}


var step1FormData = false;

//Submit form
function validateForm(form){
    var validationUrl = form.attr("action");
    var formData = form.serialize();
    
    //If there is form data from previous step, add it to current form data
    if(step1FormData){
        formData = formData+"&"+step1FormData;
    }
        
    $.ajax({
        type: "POST",
        cache: false,
        url: validationUrl,
        data: formData,
        beforeSend: function () {
            showLoading();
        }
    }).done(function (response) {
        //Show new content
        
        //If there are errors, show them on top
        if(response.errors){
            var errors = response.errors;
            
            $.each(errors, function() {
                $.each(this, function(key, value) {
                    $(".panel-body form").prepend("<div class=\"alert alert-danger\" role=\"alert\">"
                    + "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">"
                    + "<span aria-hidden=\"true\">×</span><span class=\"sr-only\">Close</span></button>"
                    + value 
                    + "</div>");
                });
            });
        }
        
        if(response.valid){
            //Go to next step
            if(response.goToNextStep){
                //Store previous step values to sent together with next step values
                $("#currentStep").val(2);
                step1FormData = form.serialize();
                
                var universityId = $("#univId").val();
                
                loadPage(step1,"id="+universityId);
            }
            //Otherwise if response fully validated, xheader will redirect to thank you page
        }
        

        //hide loader
        hideLoading();

        //toastr.success("The content successfully loaded.");

    });
}

var panel = $("#mainPanel");

//AJAX load page into panel
function loadPage(page, data){
    $.ajax({
        cache: false,
        url: page,
        data: data,
        beforeSend: function () {
            showLoading();
        }
    }).done(function (data) {
        //Show new content
        $(".panel-body form").hide().html(data).slideDown(1000);
        $("#step2 a").removeClass("btn-primary").addClass("btn-white");
        $("#step3 a").removeClass("btn-white").addClass("btn-primary");
        
        //Mobile Date selection fix for new form
        if (!isMobile()) {
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
        
        //File upload listeners on new form
        $("#photoUpload").on("change", function(event){
            var files = event.target.files;
            if(files && files.length > 0){
                photoFile = event.target.files[0];
                notUploadedPhoto = true;
            }else notUploadedPhoto = false;
        });
        $("#cvUpload").on("change", function(event){
            var files = event.target.files;
            if(files && files.length > 0){
                cvFile = event.target.files[0];
                notUploadedCV = true;
            }else notUploadedCV = false;
        });
        
        //hide loader
        hideLoading();

        //toastr.success("The content successfully loaded.");

    }).fail(function (jqXHR, textStatus) {
        hideLoading();

        // Handle notification types
        toastr.error("There was a problem while loading the content.");       
    });
}

function showLoading(){
    panel.find(".alert").remove();
    panel.find(".panel-body").append("<div class=\"refresh-container\"><div class=\"loading-bar indeterminate\"></div></div>");
}

function hideLoading(){
    panel.find(".refresh-container").fadeOut(500, function () {
        panel.find(".refresh-container").remove();
    });
}
';

//Selectize plugin for multi-select
\frontend\assets\RegistrationAsset::register($this);

$this->registerCss($css);
$this->registerJs($js);
?>
<div class="panel" id="mainPanel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('register', 'Sign up and find a job today!') ?></h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(1); ?></a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-primary btn-ripple"><?= Yii::$app->formatter->asInteger(2); ?></a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple"><?= Yii::$app->formatter->asInteger(3); ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body studentRegistration">

        <form method="post" action="<?= $formLink ?>" id="registerForm">
            <h3><?= $this->params['isArabic']? $university->university_name_ar : $university->university_name_en ?></h3>

            <?php
            //Check if the university requires verification
            $requiresVerification = false;
            if ($university->university_require_verify == \common\models\University::VERIFICATION_REQUIRED) {
                $requiresVerification = true;
            }

            $emailLabel = $requiresVerification ? "email@mydomain.com" : "email@" . $university->university_domain;
            ?>

            <input type="hidden" id="currentStep" name="step" value="1"/>
            <input type="hidden" id="univId" name="university_id" value="<?= $university->university_id ?>"/>

            <div class="questionRow">
                <p style="width:180px;"><?= Yii::t('register', 'My university email is') ?></p>

                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        <input type="email" id="email" name="student_email" class="form-control" maxlength="96" required>
                        <label for="email"><?= $emailLabel ?></label>
                    </div>
                </div>
                <br class="clear"/>
            </div>

            <div class="questionRow">
                <p style="width:215px;"><?= Yii::t('register', "I'd like my password to be") ?></p>

                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        <input type="password" id="password" name="student_password_hash" class="form-control" maxlength="32" required>
                        <label for="password"><?= Yii::t('register', "Password") ?></label>
                    </div>
                </div>
                <br class="clear"/>
            </div>
            
            <div class="questionRow" style="margin-bottom:15px;">
                <p style="width:170px;"><?= Yii::t('register', "My phone number is") ?></p>

                <div class="inputer floating-label">
                    <div class="input-wrapper">
                        <input type="tel" id="phone" name="student_contact_number" class="form-control" maxlength="8" required>
                        <label for="phone"><?= Yii::t('register', "Phone Number") ?></label>
                    </div>
                </div>
                <br class="clear"/>
            </div>

            <?php if ($requiresVerification) { ?>
                <!-- Verification details -->
                <div class="note note-primary note-top-striped" style="margin-top:35px;">
                    <h4><?= Yii::t('register', "Student ID Verification") ?></h4>
                    <p>
                        <?= Yii::t('register', "Please upload a photo of your student ID card") ?><br/><br/>
                    </p>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" data-trigger="fileinput" style="width: 250px; height: 200px;">
                            <img data-src="<?= Url::to('@web/images/universities/' . $university->university_id_template) ?>" src="<?= Url::to('@web/images/universities/' . $university->university_id_template) ?>" alt="...">
                        </div>

                        <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="max-width: 250px; max-height: 200px;"></div>
                        <div>
                            <span class="btn btn-default btn-file btn-ripple">
                                <span class="fileinput-new"><?= Yii::t('register', "Upload ID Card") ?></span>
                                <span class="fileinput-exists"><?= Yii::t('register', "Change") ?></span>
                                <input type="file" id="fileUpload" name="fileUpload"/>
                                <input type="hidden" id="idUpload" name="student_verification_attachment"/>
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput"><?= Yii::t('register', "Remove") ?></a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </form>
        
        <input id="nextStep" type="submit" class="btn btn-primary btn-ripple <?= $this->params["isArabic"]? "pull-left" : "pull-right"?>" value="<?= Yii::t('register', "Next Step") ?>"/>
    </div>
</div>