<?php

/* @var $this yii\web\View */
$this->title = Yii::t("frontend", "Student Discounts & Promotions");
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= $this->title ?></h4>
        </div>
    </div>

    <div class="panel-body">
        
        <div class="row">
            <div class="col-md-8">
                <?= Yii::t("frontend", "Please contact us if you have any discounts and promotions you wish to offer students on our platform.") ?>
            </div>
        </div>
        <br/>
        <a href="<?= yii\helpers\Url::to(['site/contact']) ?>" class="btn btn-teal">
            <?= Yii::t("frontend", "Contact Us") ?>
        </a>
    </div>

</div>
