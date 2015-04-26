<?php

use frontend\models\Student;
use yii\helpers\Url;

/* @var $university \common\models\University */

$js = "
$('.radioer input:radio').change(function(){
    if($(this).val() == 'yes'){
       $(this).parent().parent().find('.additional').show();
    }else{
       $(this).parent().parent().find('.additional').hide();
    }
});

//Animate to dropdown
$('.studentRegistration').on('click','.bootstrap-select',function(){
    $('html, body').animate({
    scrollTop: $(this).offset().top-75
    }, 400);
});

$('.selectize-majors').selectize({
    selectOnTab: true,
});
$('.selectize-text').selectize({
    delimiter: ',',
    persist: false,
    createOnBlur: true,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});

//Refresh select pickers

$('.selectpicker').selectpicker('refresh');
$('.selectpickerNoMobile').selectpicker('refresh');
$('select.selecter').selectpicker('refresh');

function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $('.selectpicker').selectpicker('mobile');
    $('select.selecter').selectpicker('mobile');
}
";


//$this->registerCss($css);
$this->registerJs($js);

Yii::$app->formatter->thousandSeparator = "";
?>

<!-- Question -->
<div class="questionRow">
    <p>
        <?= Yii::t('register', 'My email notification preferences:') ?> 
        <select class="selectpicker" data-width="auto" name="student_email_preference">
            <option><?= Yii::t('register', 'Daily as jobs are posted') ?></option>
            <option><?= Yii::t('register', 'Weekly summary') ?></option>
            <option><?= Yii::t('register', 'Off') ?></option>
        </select>
    </p>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <p style="width:100px;"><?= Yii::t('register', 'My name is') ?></p>

    <div class="inputer floating-label">
        <div class="input-wrapper">
            <input type="text" id="lastName" name="student_firstname" class="form-control" required>
            <label for="firstName"><?= Yii::t('register', 'First Name') ?></label>
        </div>
    </div>

    <div class="inputer floating-label">
        <div class="input-wrapper">
            <input type="text" id="lastName" name="student_lastname" class="form-control" required>
            <label for="lastName"><?= Yii::t('register', 'Last Name') ?></label>
        </div>
    </div>

    <p> <?= Yii::t('register', 'and I was born on') ?> </p>
    <div class="inputer floating-label" style="width:120px;">
        <div class="input-wrapper" style="width:120px;">
            <input type="date" id="birthday" name="student_dob" class="form-control" value="<?= date("Y/m/d") ?>">
        </div>
    </div>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <p>
        <?= Yii::t('register', 'I am a(n) ') ?>

        <select class="selectpickerNoMobile" name="country_id" data-live-search="true" data-width="auto">
            <option value="" disabled selected><?= Yii::t('register', 'Nationality') ?></option>
            <?php
            $countryList = \common\models\Country::find()->orderBy("country_nationality_name_en")->all();
            foreach ($countryList as $country) {
                if($this->params['isArabic']){
                    echo "<option value='" . $country->country_id . "'>" . $country->country_nationality_name_ar . "</option>";
                }else{
                    echo "<option value='" . $country->country_id . "'>" . $country->country_nationality_name_en . "</option>";
                }
            }
            ?>
        </select>
    </p>

    <br class="clear"/>
</div>


<!-- Question -->
<div class="questionRow">
    <p>
        I am currently a 

        <select class="selectpicker" name="student_status" data-width="130px">
            <option value="<?= Student::STATUS_FULL_TIME ?>"><?= Yii::t('register', 'Full-time') ?></option>
            <option value="<?= Student::STATUS_PART_TIME ?>"><?= Yii::t('register', 'Part-time') ?></option>
        </select>

        student pursuing a 

        <select class="selectpicker" name="degree_id" data-width="130px">
            <option value='' selected disabled>Degree</option>
            <?php
            $degreeList = \common\models\Degree::find()->all();
            foreach ($degreeList as $degree) {
                if($this->params['isArabic']){
                    echo "<option value='" . $degree->degree_id . "'>" . $degree->degree_name_ar . "</option>";
                }else{
                    echo "<option value='" . $degree->degree_id . "'>" . $degree->degree_name_en . "</option>";
                }
            }
            ?>
        </select>

        degree at <?= $university->university_name_en ?>.
    </p>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I enrolled in

    <select class="selectpicker" name="student_enrolment_year" data-width="130px">
        <option value='' selected disabled><?= Yii::t('register', 'Year') ?></option>
        <?php
        $currentYear = date("Y");
        $numberOfYears = 7;
        for ($i = 0; $i < $numberOfYears; $i++) {
            $yearOption = $currentYear - $i;
            echo "<option value='$yearOption'>".Yii::$app->formatter->asInteger($yearOption)."</option>";
        }
        ?>
    </select>

    and will graduate in 

    <select class="selectpicker" name="student_graduating_year" data-width="130px">
        <option value='' selected disabled><?= Yii::t('register', 'Year') ?></option>
        <?php
        $currentYear = date("Y") - 1;
        $numberOfYears = 11;
        for ($i = 0; $i < $numberOfYears; $i++) {
            $yearOption = $currentYear + $i;
            echo "<option value='$yearOption'>".Yii::$app->formatter->asInteger($yearOption)."</option>";
        }
        ?>
    </select>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I'm majoring in 
    <select multiple class="selectize-majors" name="majorsSelected[]" placeholder="Majors (type and select from list)">
        <option value=""><?= Yii::t('register', 'Select a major') ?></option>
        <?php
        $majorList = \common\models\Major::find()->all();
        foreach ($majorList as $major) {
            if($this->params['isArabic']){
                echo "<option value='" . $major->major_id . "'>" . $major->major_name_ar . "</option>";
            }else{
                echo "<option value='" . $major->major_id . "'>" . $major->major_name_en . "</option>";
            }
        }
        ?>
    </select>
</div>

<!-- Question -->

<div class="questionRow">
    <p style="width:145px;">My current GPA is </p>

    <div class="inputer floating-label ">
        <div class="input-wrapper baby">
            <input type="number" step="any" min="0.1" max="4" name="student_gpa" id="gpa"  class="form-control baby" required>
            <label for="gpa"><?= Yii::t('register', 'GPA') ?></label>
        </div>
    </div>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I am 
    <select class="selectpicker" name="student_gender" data-width="auto" title='Genderz'>
        <option value="" selected disabled><?= Yii::t('register', 'Gender') ?></option>
        <option value="<?= Student::GENDER_MALE ?>"><?= Yii::t('register', 'Male') ?></option>
        <option value="<?= Student::GENDER_FEMALE ?>"><?= Yii::t('register', 'Female') ?></option>
    </select>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I speak
    <select multiple class="selecter" name="languagesSelected[]" title='<?= Yii::t('register', 'Language(s)') ?>'>
        <?php
        $languageList = \common\models\Language::find()->all();
        foreach ($languageList as $language) {
            if($this->params['isArabic']){
                echo "<option value='" . $language->language_id . "'>" . $language->language_name_ar . "</option>";
            }else{
                echo "<option value='" . $language->language_id . "'>" . $language->language_name_en . "</option>";
            }
        }
        ?>
    </select>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    My English language level is
    <select class="selectpicker" name="student_english_level" data-width="auto" title='Levelz'>
        <option value="" selected disabled><?= Yii::t('register', 'Level') ?></option>
        <option value="<?= Student::ENGLISH_WEAK ?>"><?= Yii::t('register', 'Weak') ?></option>
        <option value="<?= Student::ENGLISH_FAIR ?>"><?= Yii::t('register', 'Fair') ?></option>
        <option value="<?= Student::ENGLISH_GOOD ?>"><?= Yii::t('register', 'Good') ?></option>
    </select>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="student_transportation" id="transport1" value="<?= Student::TRANSPORTATION_AVAILABLE ?>">
        <label for="transport1"><?= Yii::t('register', 'I have') ?></label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="student_transportation" id="transport2" value="<?= Student::TRANSPORTATION_NOT_AVAILABLE ?>">
        <label for="transport2"><?= Yii::t('register', 'I do not have') ?></label>
    </div>
    <?= Yii::t('register', 'a method of transportation.') ?>
    <br class="clear"/>
</div>

<blockquote class="blockquote-primary" style="margin-top:2em">
    <?= Yii::t('register', 'The following questions are optional but will increase your chances of being contacted by employers') ?>
</blockquote>

<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="club" id="club1" value="yes">
        <label for="club1"><?= Yii::t('register', 'I am') ?></label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="club" id="club2" value="no">
        <label for="club2"><?= Yii::t('register', 'I am not') ?></label>
    </div>
    <?= Yii::t('register', 'in a club.') ?>

    <div class="additional">
        <input type="text" name="student_club" placeholder='<?= Yii::t('register', 'Clubs im in') ?>' class="form-control selectize-text">
    </div>

    <br class="clear"/>
</div>


<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="sport" id="sport1" value="yes">
        <label for="sport1"><?= Yii::t('register', 'I play') ?></label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="sport" id="sport2" value="no">
        <label for="sport2"><?= Yii::t('register', 'I do not play') ?></label>
    </div>
    <?= Yii::t('register', 'sports.') ?>

    <div class="additional">
        <input type="text" name="student_sport" placeholder='<?= Yii::t('register', 'Sports I play') ?>' class="form-control selectize-text">
    </div>

    <br class="clear"/>
</div>

<!-- Question -->
<div class='questionRow'>
    <p style="width:285px;">
        <?= Yii::t('register', 'My favorite work experience was at') ?> 
    </p>

    <div class="inputer floating-label medz">
        <div class="input-wrapper medz">
            <input type="text" name="student_experience_company" id="experienceCompany" class="form-control">
            <label for="experienceCompany"><?= Yii::t('register', 'Company') ?></label>
        </div>
    </div>

    <p style="width:105px;">
        <?= Yii::t('register', 'working as a  ') ?>
    </p>

    <div class="inputer floating-label medz">
        <div class="input-wrapper medz">
            <input type="text" name="student_experience_position" id="experiencePosition" class="form-control">
            <label for="experiencePosition"><?= Yii::t('register', 'Position') ?></label>
        </div>
    </div>

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    <br/>
    <?= Yii::t('register', 'I have skills in ') ?>
    <input type="text" name="student_skill" placeholder='<?= Yii::t('register', 'Teamwork, time management, and photoshop') ?>' class="form-control selectize-text">

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    <?= Yii::t('register', 'My favorite hobbies are') ?>
    <input type="text" name="student_hobby" placeholder='<?= Yii::t('register', 'Cooking, playing guitar, and hiking') ?>' class="form-control selectize-text">

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    <p style="width:200px; margin-top:5px;"><?= Yii::t('register', 'A fun fact about me is') ?></p>
    <div class="inputer" style='width:70%; margin-left:0;'>
        <div class="input-wrapper" style='width:100%;'>
            <textarea name="student_interestingfacts" maxlength="200" class="form-control js-auto-size" rows="1" placeholder="<?= Yii::t('register', 'I like to travel') ?>"></textarea>
        </div>
    </div>

    <br class='clear'/>
</div>

<div class="row">
    <!-- First File Upload (Photo) -->
    <div class="col-md-6"  style="margin-top: 1.5em;">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" data-trigger="fileinput" style="width: 250px; height: 200px;">
                <img data-src="<?= Url::to('@web/images/pic.jpg') ?>" src="<?= Url::to('@web/images/pic.jpg') ?>" alt="Photo">
            </div>

            <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="max-width: 250px; max-height: 200px;"></div>
            <div>
                <span class="btn btn-default btn-file btn-ripple">
                    <span class="fileinput-new"><?= Yii::t('register', 'Upload Photo (optional)') ?></span>
                    <span class="fileinput-exists"><?= Yii::t('register', 'Change') ?></span>
                    <input type="file" id="photoUpload" name="photoUpload"/>
                    <input type="hidden" id="photoData" name="student_photo"/>
                </span>
                <a href="#" class="btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput"><?= Yii::t('register', 'Remove') ?></a>
            </div>
        </div>
    </div>
    
    <!-- Second File Upload (CV) -->
    <div class="col-md-6"  style="margin-top: 1.5em;">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" data-trigger="fileinput" style="width: 250px; height: 200px;">
                <img data-src="<?= Url::to('@web/images/cv.jpg') ?>" src="<?= Url::to('@web/images/cv.jpg') ?>" alt="CV">
            </div>

            <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="max-width: 250px; max-height: 200px;"></div>
            <div>
                <span class="btn btn-default btn-file btn-ripple">
                    <span class="fileinput-new"><?= Yii::t('register', 'Upload CV (optional)') ?></span>
                    <span class="fileinput-exists"><?= Yii::t('register', 'Change') ?></span>
                    <input type="file" id="cvUpload" name="cvUpload"/>
                    <input type="hidden" id="cvData" name="student_cv"/>
                </span>
                <a href="#" class="btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput"><?= Yii::t('register', 'Remove') ?></a>
            </div>
        </div>
    </div>
</div>