<?php
/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = "Registration";

?>
<div class="panel" id="mainPanel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Select your University</h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-primary btn-ripple">1</a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-white btn-ripple">2</a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple">3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body studentRegistration">

        <form method="post">
            
                    <?php
                    /*
                    $universities = \common\models\University::find()->all();
                    foreach ($universities as $university) {
                        echo "<option value='" . $university->university_id . "'>" . $university->university_name_en . "</option>";
                    }
                     * 
                     */
                    ?>

            <ul class="list-material has-hidden">
                <li class="has-action-left">
                    <a href="#" class="hidden"><i class="ion-chevron-right"></i></a>
                    <a href="#" class="visible">
                        <div class="list-action-left">
                            <img src="../../assets/globals/img/faces/1.jpg" class="face-radius" alt="">
                        </div>
                        <div class="list-content">
                            <span class="title">Gulf University for Science and Technology</span>
                        </div>
                    </a>
                </li>
                <li class="has-action-left">
                    <a href="#" class="hidden"><i class="ion-chevron-right"></i></a>
                    <a href="#" class="visible">
                        <div class="list-action-left">
                            <img src="../../assets/globals/img/faces/2.jpg" class="face-radius" alt="">
                        </div>
                        <div class="list-content">
                            <span class="title">Jason Bryant</span>
                        </div>
                    </a>
                </li>
                <li class="has-action-left">
                    <a href="#" class="hidden"><i class="ion-chevron-right"></i></a>
                    <a href="#" class="visible">
                        <div class="list-action-left">
                            <img src="../../assets/globals/img/faces/3.jpg" class="face-radius" alt="">
                        </div>
                        <div class="list-content">
                            <span class="title">Pari Subramanium</span>
                        </div>
                    </a>
                </li>
            </ul>
            
        </form>
    </div>
</div>