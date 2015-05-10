<?php
/* @var $this yii\web\View */
$this->title = 'StudentHub';
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">


                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <h2>Start your Recruitment Today!</h2>
                    </div><!--.col-->
                    <div class="col-md-9 col-sm-12">
                        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                        <p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
                    </div><!--col-->
                </div><!--.row-->

                <div class="row client-list">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/1.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/2.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/3.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/4.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/5.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/6.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/7.png" alt=""></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <a href="#"><img src="img/brands/8.png" alt=""></a>
                    </div>
                </div><!--.row.client-list-->

                
                <h2>Link to student portal:</h2>
                <?php
                //Link to Student Front-end
                $urlLink = Yii::$app->urlManagerFrontend->createUrl(["site/index"]);
                echo "<a href='$urlLink'>$urlLink</a>";
                ?>
            </div>
        </div><!-- panel-body -->
    </div><!--panel-->

</div><!--col-md-12-->
</div><!--row-->