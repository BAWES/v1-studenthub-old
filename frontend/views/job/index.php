<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Browse Jobs');
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Browse Jobs');

$css = "
.shareButtons div{text-align:center;}
";


/**
 * Loading Job Details Functionality
 */
$js = '
var $aboutJob = $("#about-job").find(".modal-content");
var loadingIndicator = $aboutJob.html();

$("#jobList").on("click", ".jobDetail", function(){
    var detailLink = $(this).attr("data-job");

    $.ajax({
        url: detailLink,
        cache: false,
        beforeSend: function () {
            $aboutJob.html(loadingIndicator);
        },
        success: function(response, textStatus, jqXHR)
        {
            $aboutJob.html(response);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
});
';


$this->registerCssFile("@web/plugins/bootstrap-social/bootstrap-social.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCss($css);
$this->registerJs($js);
?>

<div id="jobList">
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-md-4', 'style' => ''],
        'itemView' => "_job",
    ])
    ?>
</div>

<!-- Share Modal -->
<div class="modal scale fade" id="share" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Share</h4>                                                
            </div>
            <div class="modal-body">
                <div class="row shareButtons" style="padding-bottom: 1em;">
                    <div class="col-xs-4">
                        <a href='#shareLink' target='_blank' class="btn btn-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>                                                
                    </div>
                    <div class="col-xs-4">
                        <a href='#shareLink' target='_blank' class="btn btn-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>                                                
                    </div>
                    <div class="col-xs-4">
                        <a href='#shareLink' target='_blank' class="btn btn-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a> 
                    </div>
                </div>
                <div class="form-group" style='margin-top:10px; margin-bottom:0;'>
                    <h4>Link</h4>
                    <input id="linktoCopy" type="text" class="form-control" value="http://www.studenthub.co/job/zain/call-center-1">
                </div>
            </div>
        </div><!--.modal-content-->
    </div><!--.modal-dialog-->
</div><!--.modal-->


<!-- Questions Modal -->
<div class="modal scale fade" id="interviewQuestions" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Interview Questions</h4>
            </div>
            <div class="modal-body">
                How old were you?
                <div class="inputer">
                    <div class="input-wrapper">
                        <textarea class="form-control js-auto-size" rows="1"></textarea>
                    </div>
                </div>

                Do you like our products?
                <div class="inputer">
                    <div class="input-wrapper">
                        <textarea class="form-control js-auto-size" rows="1"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat btn-primary">Apply</button>
            </div>
        </div><!--.modal-content-->
    </div><!--.modal-dialog-->
</div><!--.modal-->


<!-- More Info Modal -->
<div class="modal fade full-height <?= $this->params['isArabic'] ? "from-left" : "from-right" ?> " id="about-job" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer', "Loading Job Details..") ?></h4>
            </div>
            <div class="modal-body">
                <div class="loading-bar indeterminate margin-top-10"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-ripple" data-dismiss="modal"><?= Yii::t('app', "Close") ?></button>
            </div>
        </div>
    </div><!--.modal-->
</div>