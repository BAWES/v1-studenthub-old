<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";


$css = "
.inputer{width:250px; float:left; margin-left:10px; margin-right:10px;}
.input-wrapper{width:250px;}

.inputer.big, .input-wrapper.big{width:300px;}

.input-wrapper.year, .inputer.year{width:80px}

.bootstrap-select{margin-left:4px !important; margin-right:5px !important;}
.selecter{width:300px !important;}

.studentRegistration p{margin-top:35px; margin-bottom:0; float:left;}

.additional{display:none; clear:both;}
br.clear{clear:both;}
        ";


$js = "
$('.radioer input:radio').change(function(){
    if($(this).val() == 'yes'){
       $(this).parent().parent().find('.additional').show();
    }else{
       $(this).parent().parent().find('.additional').hide();
    }
});

$('.selectize-majors').selectize({
    selectOnTab: true,
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
            <!-- Questions #1 -->
            <div class="questionRow">
                <p>
                    My email notification preferences: 
                    <select class="selectpicker" data-width="auto">
                        <option>Daily when new jobs are posted</option>
                        <option>Weekly summary of available jobs</option>
                    </select>
                </p>
                <br class="clear"/>
            </div>

            <!-- Questions #2 -->
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

            <!-- Questions #3 -->
            <br/>
            <div class="questionRow">
                I am pursuing a 
                <select class="selectpicker" data-width="130px">
                    <option>Diploma</option>
                    <option>Bachelors</option>
                    <option>Masters</option>
                    <option>PhD</option>
                </select>
                degree at Gulf University for Science and Technology.

                <br class="clear"/>
            </div>

            <!-- Questions #4 -->
            <div class="questionRow">
                <p style="width:100px;">I enrolled in</p>

                <div class="inputer floating-label year">
                    <div class="input-wrapper year">
                        <input type="text" class="form-control" required>
                        <label for="exampleInput1">Year</label>
                    </div>
                </div>

                <p>
                    and will graduate in 
                </p>

                <div class="inputer floating-label year">
                    <div class="input-wrapper year">
                        <input type="text" class="form-control" required>
                        <label for="exampleInput1">Year</label>
                    </div>
                </div>

                <br class="clear"/>
            </div>

            <!-- Question #5 -->
            <div class="questionRow">
                <br/>
                I'm majoring in 
                <select multiple class="selectize-majors" placeholder="Majors (type and select from list)">
                    <option value="">Select a major</option>
                    <?php
                    $majorList = \common\models\Major::find()->all();
                    foreach($majorList as $major){
                        echo "<option value='".$major->major_id."'>".$major->major_name_en."</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Question #6 -->

            <!--gpa-->

            <!-- Question #7 -->
            <div class="questionRow">
                <p>
                    I am 
                    <select class="selectpicker" data-width="auto">
                        <option value="" selected="selected" disabled>Gender</option>
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
                <select multiple class="selecter">
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


            <!-- Question #9 -->
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

                    <div class="inputer floating-label big" >
                        <div class="input-wrapper big">
                            <input type="text" class="form-control" required>
                            <label for="exampleInput1">Sport(s) I play</label>
                        </div>
                    </div>
                </div>

                <br class="clear"/>
            </div>

            content</br>
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