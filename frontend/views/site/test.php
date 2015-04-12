<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";



$css = "
.inputer{width:250px; float:left; margin-left:10px; margin-right:10px;}
.input-wrapper{width:250px;}

.bootstrap-select{margin-left:4px !important; margin-right:5px !important;}

.studentRegistration p{margin-top:35px; margin-bottom:0; float:left;}
        ";



$this->registerCss($css);
?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title"><h4>Complete your profile to find a job today!</h4></div>
    </div>

    <div class="panel-body studentRegistration">
        <form action="#">
            <div>
                My email notification preferences: 
                <select class="selectpicker" data-width="auto">
                    <option>Daily when new jobs are posted</option>
                    <option>Weekly</option>
                </select>
            </div>

            <div>
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
                        <option selected disabled>Status</option>
                        <option>Full-time</option>
                        <option>Part-time</option>
                    </select>
                    student.
                </p>
                
                
                <!-- form submit button -->
                <br style="clear:both"/><br/>
                <input type="submit"/>
        </form>
        
    </div>
</div>
</div>