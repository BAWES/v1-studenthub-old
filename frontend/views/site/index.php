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
                        
                        <div class="row">
                            <div class="col-md-6">
				<div class="card card-event card-clickable">

					<div class="card-heading bg-image sample-bg-image13">
					</div><!--.card-heading-->

					<div class="card-body">
						<div class="calendar">
							<div class="month">November</div>
							<div class="date">27</div>
						</div><!--.calendar-->
						<h4>Click Floating Button</h4>
						<p>A Social Networking group with an International mix of Young Professionals interested in meeting other like minded people for friendship / networking / partying at exclusive Members Clubs, Lounges &amp; Bars. Recommended age range is 21+.</p>
					</div><!--.card-body-->

					<div class="clickable-button">
						<div class="layer bg-red"></div>
						<a class="btn btn-floating btn-red initial-position floating-open btn-ripple"><i class="ion-android-more-horizontal"></i><span class="ripple _26 animate" style="height: 48px; width: 48px; top: -8px; left: -14px;"></span><span class="ripple _28 animate" style="height: 48px; width: 48px; top: 11px; left: 16px;"></span></a>
					</div>

					<div class="layered-content bg-red">
						<div class="overflow-content">
							<h4>Young Professionals London</h4>
							<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
							<p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
							<p>Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
						</div><!--.overflow-content-->
						<div class="clickable-close-button">
							<a class="btn btn-floating initial-position floating-close btn-ripple"><i class="ion-android-close"></i><span class="ripple _27 animate" style="height: 48px; width: 48px; top: 1px; left: -11px;"></span><span class="ripple _29 animate" style="height: 48px; width: 48px; top: -12px; left: -1px;"></span></a>
						</div>
					</div>

				</div><!--.card-->
			</div>
                            
                            <div class="col-md-6">
				<div class="card card-event card-clickable">

					<div class="card-heading bg-image sample-bg-image13">
					</div><!--.card-heading-->

					<div class="card-body">
						<div class="calendar">
							<div class="month">November</div>
							<div class="date">27</div>
						</div><!--.calendar-->
						<h4>Click Floating Button</h4>
						<p>A Social Networking group with an International mix of Young Professionals interested in meeting other like minded people for friendship / networking / partying at exclusive Members Clubs, Lounges &amp; Bars. Recommended age range is 21+.</p>
					</div><!--.card-body-->

					<div class="clickable-button">
						<div class="layer bg-red"></div>
						<a class="btn btn-floating btn-red initial-position floating-open btn-ripple"><i class="ion-android-more-horizontal"></i><span class="ripple _26 animate" style="height: 48px; width: 48px; top: -8px; left: -14px;"></span><span class="ripple _28 animate" style="height: 48px; width: 48px; top: 11px; left: 16px;"></span></a>
					</div>

					<div class="layered-content bg-red">
						<div class="overflow-content">
							<h4>Young Professionals London</h4>
							<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
							<p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
							<p>Completely synergize resource sucking relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
						</div><!--.overflow-content-->
						<div class="clickable-close-button">
							<a class="btn btn-floating initial-position floating-close btn-ripple"><i class="ion-android-close"></i><span class="ripple _27 animate" style="height: 48px; width: 48px; top: 1px; left: -11px;"></span><span class="ripple _29 animate" style="height: 48px; width: 48px; top: -12px; left: -1px;"></span></a>
						</div>
					</div>

				</div><!--.card-->
			</div>
                        </div>
                        
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