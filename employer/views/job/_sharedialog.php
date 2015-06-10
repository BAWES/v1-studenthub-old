<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model employer\models\Job */

$shareUrl = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['job/share', 'id' => $model->job_id]);
?>

<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title"><?= Yii::t('frontend', 'Share') ?></h4>                                                
    </div>
    <div class="modal-body">
        <div class="row shareButtons" style="padding-bottom: 1em;">
            <div class="col-xs-4">
                <a href="javascript:fbShare('<?= $shareUrl ?>', '<?= Html::encode($model->job_title) ?>', '<?= Html::encode($model->job_responsibilites) ?>', '<?= Html::encode(Url::to('@web/img/StudentHub-logo.jpg', true)) ?>', 520, 350)" class="btn btn-facebook">
                    <i class="fa fa-facebook"></i>
                </a>                                                
            </div>
            <div class="col-xs-4">
                <a href="javascript:twtShare('<?= $shareUrl ?>', 'Job opening at <?= Html::encode($model->employer->employer_company_name) ?> on @studenthubco')" class="btn btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>                                                
            </div>
            <div class="col-xs-4">
                <a href="javascript:lnkdShare('<?= $shareUrl ?>', '<?= Html::encode($model->job_title) ?>', '<?= Html::encode($model->job_responsibilites) ?>')" target='_blank' class="btn btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                </a> 
            </div>
        </div>
        <div class="form-group" style='margin-top:10px; margin-bottom:0;'>
            <h4><?= Yii::t('frontend', 'Link') ?></h4>
            <input id="linktoCopy" type="text" class="form-control" value="<?= $shareUrl ?>">
        </div>
    </div>
</div><!--.modal-content-->

<script>
function fbShare(url, title, descr, image, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (winHeight / 2);
    var winLeft = (screen.width / 2) - (winWidth / 2);
    window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

function twtShare(url, text) {
  window.open( "http://twitter.com/share?url=" + 
    encodeURIComponent(url) + "&text=" + 
    encodeURIComponent(text) + "&count=none/", 
    "tweet", "height=300,width=550,resizable=1" );
}

function lnkdShare(url, title, summary) {
  window.open( "https://www.linkedin.com/shareArticle?mini=true&url="+url+"&title="+ title +"&source=StudentHub&summary="+summary, "linkedin", "height=300,width=550,resizable=1"); 
}
</script>