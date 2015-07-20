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
            <div class="col-lg-6">
                <?= Yii::t("frontend", "We plan to add discounts and promotions for students in the future") ?>
                <br/><br/>
                <a href="<?= yii\helpers\Url::to(['site/index']) ?>" class="btn btn-primary">
                    <?= Yii::t("frontend", "Back to Home") ?>
                </a>
            </div>
        </div>
    </div>

</div>
