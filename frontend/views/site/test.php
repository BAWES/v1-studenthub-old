<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";


$css = "
.inputer{width:250px; float:left; margin-left:10px; margin-right:10px;}
.input-wrapper{width:250px;}

.input-wrapper.huge, .inputer.huge{width:300px;}
.input-wrapper.baby, .inputer.baby{width:80px}

.bootstrap-select{margin-left:4px !important; margin-right:5px !important;}
.selecter{width:300px !important;}

.studentRegistration p{margin-top:35px; margin-bottom:0; float:left;}

.additional{display:none; clear:both;}
br.clear{clear:both;}
        ";


$js = "
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $('.selectpicker').selectpicker('mobile');
}

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

";

//Selectize plugin for multi-select
\frontend\assets\SelectizeAsset::register($this);

$this->registerCss($css);
$this->registerJs($js);
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title"><h4>Complete your profile to find a job today!</h4></div>
    </div>

    <div class="panel-body studentRegistration">
        <form action="#">
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
                        <input type="text" class="form-control baby" required>
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
                    <option>English</option>
                    <option>Arabic</option>
                    <option>French</option>
                    <option>Spanish</option>
                    <option>German</option>
                    <option>Hindi</option>
                    <option>Urdu</option>
                    <option>Farsi</option>
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
                <br/>
                <p style="width:200px; margin-top:5px;">A fun fact about me is</p>
                <div class="inputer" style='width:70%; margin-left:0;'>
                    <div class="input-wrapper" style='width:100%;'>
                        <textarea class="form-control js-auto-size" rows="1" placeholder="I like to travel"></textarea>
                    </div>
                </div>
                
                <br class='clear'/>
            </div>

            
            <!-- ADDITIONAL CONTENT PLACEHOLDER -->
            <br/><br/>content</br>
            content</br>
            content</br>
            content</br>
            content</br>
            content</br>
            content</br>
            content</br>
            content</br>



            <!-- form submit button -->
            <br class="clear"/><br/>
            <input type="submit"/>
        </form>

    </div>
</div>