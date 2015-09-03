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
                    <img src="<?= Url::to("@web/images/employer-list/employer2.jpg") ?>" style="width:100%" alt="Koot Brand">
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
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer5.jpg") ?>" style="width:100%" alt="BAWES - Built Awesome">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer6.jpg") ?>" style="width:100%" alt="Bevv Studios">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer7.jpg") ?>" style="width:100%" alt="Fashionet">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer8.jpg") ?>" style="width:100%" alt="Ulta3">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer9.jpg") ?>" style="width:100%" alt="9 Round Circuit">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer10.jpg") ?>" style="width:100%" alt="TABCo. International Food Catering K.S.C.C">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer11.jpg") ?>" style="width:100%" alt="Expression Institute for Private Training">
                </div>
            </div>
        </div>
    </div>
    
    
</div>

<div class="panel" style="text-align:center; padding-top:0.5em; padding-bottom:1em">
    <h2><?= Yii::t("frontend", "Interested?") ?></h2>
    <a href="<?= Url::to(['site/index']) ?>" class="btn btn-teal">
        <?= Yii::t("frontend", "Join StudentHub Today!") ?>
    </a>
</div>
