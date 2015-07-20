<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t("frontend", "Employers on StudentHub");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <h2 style="padding:0.8em; text-align:center;"><?= $this->title ?></h2>
</div>

<!-- Logos are 400x400 -->
<div class="row">
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer1.jpg") ?>" style="width:100%" alt="Ghaliah">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer2.jpg") ?>" style="width:100%" alt="Koot">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer3.jpg") ?>" style="width:100%" alt="Deal GTC">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer4.jpg") ?>" style="width:100%" alt="Hyundai Elevators">
                </div>
            </div>
        </div>
    </div>
    
</div>


<div class="panel" style="text-align:center; padding-top:0.5em; padding-bottom:1em">
    <h2><?= Yii::t("frontend", "Interested?") ?></h2>
    <a href="<?= Url::to(['site/index']) ?>" class="btn btn-primary">
        <?= Yii::t("frontend", "Join StudentHub Today!") ?>
    </a>
</div>
