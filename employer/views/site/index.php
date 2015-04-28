<?php
/* @var $this yii\web\View */
$this->title = 'Employers';
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">


                <h1>You're an Employer!</h1>

                <p class="lead">This is where you find the perfect candidate!</p>
                <p>
                    <a class="btn btn-lg btn-danger toastr-notify" data-toastr-type="success" data-toastr-title="New Applicant!" 
                       data-toastr-notification="We found you the perfect applicant!" href="#">Don't click this</a>
                </p>
                
                <?php
                //Link to Student Front-end
                $urlLink = Yii::$app->urlManagerFrontend->createUrl(["site/index"]);
                echo "<a href='$urlLink' target='_blank'>$urlLink</a>";
                ?>
            </div>
        </div><!-- panel-body -->
    </div><!--panel-->

</div><!--col-md-12-->
</div><!--row-->