<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";



$css = "
.inputer{width:250px; float:left; margin-left:10px; margin-right:10px;}
.input-wrapper{width:250px;}

.input-wrapper.year, .inputer.year{width:80px}

.bootstrap-select{margin-left:4px !important; margin-right:5px !important;}

.studentRegistration p{margin-top:35px; margin-bottom:0; float:left;}

br.clear{clear:both;}
        ";

/* IMPORTANT */
/* IMPORTANT */
/* IMPORTANT */
/* IMPORTANT */
/*
 * Apply client-side masks/input types and validation where neccessary
 */

$this->registerCss($css);
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title"><h4>Complete your profile to find a job today!</h4></div>
    </div>

    <div class="panel-body studentRegistration">
        <form action="#">
            <!-- Questions #1 -->
            <div class="questionRow">
                My email notification preferences: 
                <select class="selectpicker" data-width="auto">
                    <option>Daily when new jobs are posted</option>
                    <option>Weekly summary of available jobs</option>
                </select>
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

            <!-- form submit button -->
            <br class="clear"/><br/>
            <input type="submit"/>
        </form>

    </div>
</div>