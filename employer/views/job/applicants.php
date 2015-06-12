<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Applicants');
$this->params['breadcrumbs'][] = ['label' => $model->job_title, 'url' => ['dashboard/index']];
;
$this->params['breadcrumbs'][] = $this->title;

$css = "
.subhead{
	font-size: 13px;
	padding-top: 7px;
}
h3 a{
	font-size: 20px;
	font-weight: bold;
	line-height: 26px;
	color: inherit;
}
.card.card-user .card-heading.heading-center .user-image{
	left: 50%;
	margin-left: -40px;
	top: 80px;
}
.card-body{
	font-size: 14px;
}
.p{
	margin-top: -50px;
}
.col-lg-4{
    font-size: 3px;
}
.card .card-body #users li a img{
  width: 40px;
  height: 40px;
  border-radius: 3px;
}
.card .card-body #users{
  width: 100%;
  height: 64px;
  padding: 3px 20px;
  border-top: 1px solid #f0f0f0;
  border-bottom: 1px solid #f0f0f0;
  overflow: hidden;
  text-align: center;
}
.card .card-body #users li {;
  display: inline-block;
  margin: 8px 2px;
}
.card .card-footer.applicants{
  background: #fff;
  padding: 15px 20px;
  border-top: 0;
}
.card .card-footer.applicants{
  position: relative;
  padding: 15px;
  border-top: 1px solid #f0f0f0;
}
.card .card-footer.applicants li{
  display: inline-block;
  border-right: 1px #f0f0f0 solid;
  padding: 0 5px;  
}
.card .card-footer.applicants li:last-child {
  border-right: 0;
}
.card .card-footer.applicants ul {
  text-align: center;
}
.card .card-body.applicants{
    padding-bottom: 0px;
}

.card .card-body.applicants .editPosting{
    position:absolute;
    top: -28px;
    right:10px;
}
.card .card-body.applicants .moreInfoPosting{
    position:absolute;
    top: -28px;
    left:10px;
}
";
$this->registerCss($css);
?>
<div class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_applicant',
    ])
    ?>


</div>


<!-- Contact Details Modal -->
<div class="modal scale fade" id="contactDetailsDialog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer', "Loading Contact Details..") ?></h4>
            </div>
            <div class="modal-body">
                <div class="loading-bar indeterminate margin-top-10"></div>
            </div>
        </div><!--.modal-content-->
    </div><!--.modal-dialog-->
</div><!--.modal-->



<!-- More Details Modal -->
<div class="modal fade full-height from-<?= $this->params['isArabic']?"left":"right"?>" id="panel-modal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Saleem Aboabdo</h4>
                <img src="../../assets/globals/img/faces/2.jpg" alt="" class="img-circle pull-<?= $this->params['isArabic']?"left":"right"?>">
            </div>
            <div class="modal-body">                                                
                <p> Masters Degree, Year 4<br>
                    <b>University:</b> Gulf University for Science and Technology<br>                                                    
                    <b>Major:</b> Management Information Systems<br>
                    <b>GPA:</b> 3.0<br><br>
                    <b>Gender:</b> Male<br>
                    <b>Nationality:</b> Kuwaiti<br> 
                    <b>Languages:</b> English, Arabic, Spanish<br>
                    <b>English Language Level:</b> Fair<br><br>                                                    
                    <b>Sport(s):</b> Football, Basketball, Volleyball<br>
                    <b>Club(s):</b> Anime Club, Film Club<br>
                    <b>Have a method of Transportation:</b> Yes<br><br>
                    <b>Skill(s):</b> Teamwork, Time Management, Photoshop, Microsoft Office<br>
                    <b>Hobbies:</b> Cooking, Playing Guitar, Playing Video Games<br>
                    <b>Fun Fact:</b> I like to travel<br><br>
                    <b>Applied:</b> 01/01/2001                                                                                                                                                                                                                
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat-primary" data-dismiss="modal">View CV</button>
            </div>
        </div>
    </div>                                
</div><!--.modal-->