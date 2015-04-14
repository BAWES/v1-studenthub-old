<?php
$css = "

";


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
    }, 800);
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
?>

<!-- Question -->
<div class="questionRow">
    <p>
        My email notification preferences: 
        <select class="selectpicker" data-width="auto">
            <option>Daily as jobs are posted</option>
            <option>Weekly summary</option>
            <option>Off</option>
        </select>
    </p>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <p style="width:100px;">My name is</p>

    <div class="inputer floating-label">
        <div class="input-wrapper">
            <input type="text" class="form-control" required>
            <label for="exampleInput1">First Name</label>
        </div>
    </div>

    <div class="inputer floating-label">
        <div class="input-wrapper">
            <input type="text" class="form-control" required>
            <label for="exampleInput1">Last Name</label>
        </div>
    </div>

    <p> and I am a 
        <select class="selectpicker" data-width="130px">
            <option>Full-time</option>
            <option>Part-time</option>
        </select>
        student.
    </p>
    <br class="clear"/>
</div>

<!-- Question -->
<br/>
<div class="questionRow">
    I am pursuing a 
    <select class="selectpicker" data-width="130px">
        <option value='' selected disabled>Degree</option>
        <option>Diploma</option>
        <option>Bachelors</option>
        <option>Masters</option>
        <option>PhD</option>
    </select>
    degree at Gulf University for Science and Technology.

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I enrolled in

    <select class="selectpicker" data-width="130px">
        <option value='' selected disabled>Year</option>
        <?php
        $currentYear = date("Y");
        $numberOfYears = 7;
        for ($i = 0; $i < $numberOfYears; $i++) {
            $yearOption = $currentYear - $i;
            echo "<option value='$yearOption'>$yearOption</option>";
        }
        ?>
    </select>

    and will graduate in 

    <select class="selectpicker" data-width="130px">
        <option value='' selected disabled>Year</option>
        <?php
        $currentYear = date("Y") - 1;
        $numberOfYears = 11;
        for ($i = 0; $i < $numberOfYears; $i++) {
            $yearOption = $currentYear + $i;
            echo "<option value='$yearOption'>$yearOption</option>";
        }
        ?>
    </select>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    I'm majoring in 
    <select multiple class="selectize-majors" placeholder="Majors (type and select from list)">
        <option value="">Select a major</option>
        <?php
        $majorList = \common\models\Major::find()->all();
        foreach ($majorList as $major) {
            echo "<option value='" . $major->major_id . "'>" . $major->major_name_en . "</option>";
        }
        ?>
    </select>
</div>

<!-- Question -->

<div class="questionRow">
    <p style="width:145px;">My current GPA is </p>

    <div class="inputer floating-label ">
        <div class="input-wrapper baby">
            <input type="number" step="any" min="0.1" max="4" inputmode="numeric" pattern="[0-9]*" class="form-control baby" required>
            <label for="exampleInput5">GPA</label>
        </div>
    </div>

    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <p>
        I am 
        <select class="selectpicker" data-width="auto" title='Genderz'>
            <option value="" selected disabled>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </p>
    <br class="clear"/>
</div>

<!-- Question #8 -->
<div class="questionRow">
    <br/>
    I speak
    <select multiple class="selecter" title='Language(s)'>
        <?php
        $languageList = \common\models\Language::find()->all();
        foreach ($languageList as $language) {
            echo "<option value='" . $language->language_id . "'>" . $language->language_name_en . "</option>";
        }
        ?>
    </select>
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="transport" id="transport1" value="yes">
        <label for="transport1">I have</label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="transport" id="transport2" value="no">
        <label for="transport2">I do not have</label>
    </div>
    a method of transportation.
    <br class="clear"/>
</div>

<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="club" id="club1" value="yes">
        <label for="club1">I am</label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="club" id="club2" value="no">
        <label for="club2">I am not</label>
    </div>
    in a club.

    <div class="additional">
        <input type="text" placeholder='Clubs im in' class="form-control selectize-text" required>
    </div>

    <br class="clear"/>
</div>


<!-- Question -->
<div class="questionRow">
    <br/>
    <div class="radioer form-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="yes">
        <label for="inlineRadio1">I play</label>
    </div>
    <div class="radioer form-inline">
        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="no">
        <label for="inlineRadio2">I do not play</label>
    </div>
    sports.

    <div class="additional">
        <input type="text" placeholder='Sports I play' class="form-control selectize-text" required>
    </div>

    <br class="clear"/>
</div>

<!-- Question -->
<div class='questionRow'>
    <p style="width:285px;">
        My favorite work experience was at 
    </p>

    <div class="inputer floating-label medz">
        <div class="input-wrapper medz">
            <input type="text" class="form-control">
            <label for="exampleInput5">Company</label>
        </div>
    </div>

    <p style="width:105px;">
        working as a  
    </p>

    <div class="inputer floating-label medz">
        <div class="input-wrapper medz">
            <input type="text" class="form-control">
            <label for="exampleInput5">Position</label>
        </div>
    </div>

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    <br/>
    I have skills in 
    <input type="text" placeholder='Teamwork, time management, and photoshop' class="form-control selectize-text">

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    My favorite hobbies are
    <input type="text" placeholder='Cooking, playing guitar, and hiking' class="form-control selectize-text">

    <br class='clear'/>
</div>

<!-- Question -->
<div class='questionRow'>
    <p style="width:200px; margin-top:5px;">A fun fact about me is</p>
    <div class="inputer" style='width:70%; margin-left:0;'>
        <div class="input-wrapper" style='width:100%;'>
            <textarea maxlength="200" class="form-control js-auto-size" rows="1" placeholder="I like to travel"></textarea>
        </div>
    </div>

    <br class='clear'/>
</div>


<!-- ADDITIONAL CONTENT PLACEHOLDER -->
<div class="note note-primary note-top-striped" style="margin-top:50px;">
    <h4>Student ID Verification</h4>
    <p>
        As your university does not provide you with student emails, please upload a photo of your student ID card
    </p>

    <div class="btn-group btn-group-justified">
        <div class="btn-group">
            <a class="btn btn-blue btn-ripple" style="color:white; text-decoration: none;">
                <span class="glyphicon glyphicon-camera"></span> Camera</a>
        </div><!--.btn-group-->
        <div class="btn-group">
            <a class="btn btn-red btn-ripple" style="color:white; text-decoration: none;">
                <span class="glyphicon glyphicon-upload"></span> Upload</a>
        </div><!--.btn-group-->
    </div>
</div>


<!-- form submit button -->
<br class="clear"/><br/>
<input type="submit"/>