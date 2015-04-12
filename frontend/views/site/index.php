<?php
/* @var $this yii\web\View */
$this->title = 'Welcome to StudentHub';
?>

<?php
//Define block for header navigation/scrollable tabs
$this->beginBlock('header-tabs');
?>
<div class="header-tabs scrollable-tabs sticky">
    <ul class="nav nav-tabs tabs-active-text-white tabs-active-border-yellow">
        <li class="active"><a href="#students" data-toggle="tab">Students</a></li>
        <li><a href="#employers" data-toggle="tab">Employers</a></li>
    </ul>
</div>
<?php $this->endBlock(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">

                <div class="tab-content with-panel">
                    
                    <!-- Students Tab -->
                    <div class="tab-pane active text-style" id="students">

                        <h1>You're a Student!</h1>

                        <p class="lead">This is where the magic happens! Find a job!</p>
                        <p>
                            <a class="btn btn-lg btn-danger toastr-notify" data-toastr-type="success" data-toastr-title="Applied!" 
                               data-toastr-notification="You have applied for the job!" href="#">Don't click this</a>
                        </p>
                        
                    </div><!--tab-pane-->
                    
                    <!-- Employers tab -->
                    <div class="tab-pane text-style" id="employers">

                        <h1>You're an Employer!</h1>

                        <p class="lead">This is where you find the perfect candidate!</p>
                        <p>
                            <a class="btn btn-lg btn-danger toastr-notify" data-toastr-type="success" data-toastr-title="New Applicant!" 
                               data-toastr-notification="We found you the perfect applicant!" href="#">Don't click this</a>
                        </p>

                    </div><!--tab-pane-->


                </div>
            </div><!-- panel-body -->
        </div><!--panel-->
        
    </div><!--col-md-12-->
</div><!--row-->