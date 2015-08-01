<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t("frontend", "Demonstration");
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= Yii::t("frontend", "Employer Demo") ?></h4>
            </div>
        </div>

        <div class="panel-body">
            
            <p>
                <?= Yii::t("frontend", "Log on to the employer section to see how the employer portal works. Posting a job opportunity is a simple process.") ?>
            </p>
            
            <p>
                <strong><?= Yii::t("frontend", "Email:") ?> </strong> demo@studenthub.co <br/>
                <strong><?= Yii::t("frontend", "Password:") ?> </strong> demo1
            </p>
            
            <a href="http://employer.studenthubdemo.co" target="_blank" class="btn btn-teal">
                <?= Yii::t("frontend", "Try Demo") ?>
            </a>
            
            <br/><br/>
            
            <a href="http://employer.studenthubdemo.co" target="_blank">
                <img src="<?= Url::to("@web/images/employer-portal.png") ?>" style="width:100%;">
            </a>
            
        </div>

    </div>
</div>

<div class="col-sm-6">
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= Yii::t("frontend", "Student Demo") ?></h4>
            </div>
        </div>

        <div class="panel-body">

            <p>
                <?= Yii::t("frontend", "Log on to the student section to see how the student portal works. Students can easily browse and apply for jobs.") ?>
            </p>
            
            <p>
                <strong><?= Yii::t("frontend", "Email:") ?> </strong> demo@studenthub.co <br/>
                <strong><?= Yii::t("frontend", "Password:") ?> </strong> demo1
            </p>
            
            <a href="http://studenthubdemo.co" target="_blank" class="btn btn-primary">
                <?= Yii::t("frontend", "Try Demo") ?>
            </a>
            
            <br/><br/>
            
            <a href="http://studenthubdemo.co" target="_blank">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/lSOwbL1Mbs8" frameborder="0" allowfullscreen></iframe>
            </a>
        </div>

    </div>
</div>