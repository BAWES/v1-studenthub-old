<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Applicants');
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
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_applicant',
    ]) ?>


</div>
