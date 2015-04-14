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
";


$this->registerCss($css);
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
            <input type="number" step="any" min="0.1" max="4" class="form-control baby" required>
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