<?php

use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $jobsApplied array */

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
var currentCard;
var fromModal = false;

$("#jobList").on("click", ".jobDetail", function(){
    currentCard = $(this).parent().parent().parent().parent();
    fromModal = true;
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


/**
 * Job Applying Functionality
 */
$applyLink = Yii::$app->urlManager->createUrl(['job/apply']);
$js .= '
var $interviewQuestions = $("#interviewQuestions");
var $interviewQuestionsContent = $interviewQuestions.find(".modal-content");
var questionsLoadingIndicator = $interviewQuestionsContent.html();


$("body").on("click", ".job-apply", function(){
    if(!fromModal){
        currentCard = $(this).parent().parent().parent().parent();
    }
    
    fromModal = false;
    
    var jobId = $(this).attr("data-job");
    
    if($(this).hasClass("job-hasQuestions")){
        var questionsUrl = $(this).attr("data-questions");
        loadQuestions(questionsUrl);
    }else{
        applyTo(jobId,"","");
    } 
});

$interviewQuestions.on("click", ".interviewSubmit", function(){
    var jobId = $(this).attr("data-job");
    var answer1 = $interviewQuestionsContent.find(".question1").val();
    var answer2 = $interviewQuestionsContent.find(".question2").val();
    
    applyTo(jobId,answer1,answer2);
});

function loadQuestions(questionsUrl){
    $.ajax({
        url: questionsUrl,
        cache: false,
        beforeSend: function () {
            $interviewQuestionsContent.html(questionsLoadingIndicator);
            $interviewQuestions.modal("show");
        },
        success: function(response, textStatus, jqXHR)
        {
            $interviewQuestionsContent.html(response);
            $(".js-auto-size").textareaAutoSize();
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
}

function applyTo(job, answer1, answer2){
    var csrfToken = $("meta[name=\'csrf-token\']").attr("content");

    $.ajax({
        type: "POST",
        cache: false,
        url: "'.$applyLink.'",
        data: {job: job, answer1: answer1, answer2: answer2, _csrf:csrfToken},
        beforeSend: function () {
            $interviewQuestions.modal("hide");
            showLoading(currentCard);
        }
    }).done(function (response) {
        
        if(response.valid == true){
            toastr.success(response.message);
            //Update card markup so student can no longer apply again
            currentCard.find(".job-apply")
                        .removeClass("btn-cyan")
                        .addClass("disabled btn-success")
                        .html("<i class=\'glyphicon glyphicon-ok\'></i>");
            $("#about-job").find(".job-apply")
                        .removeClass("btn-cyan")
                        .addClass("disabled btn-success")
                        .html("<i class=\'glyphicon glyphicon-ok\'></i>");
        }else{
            $.each(response.message, function() {
                $.each(this, function(key, value) {
                    toastr.error(value);
                });
            });
        }
        
        hideLoading(currentCard);

    });
}

function showLoading(card){
    card.append("<div class=\"refresh-container\"><div class=\"loading-bar indeterminate loading-light-blue\"></div></div>");
}

function hideLoading(card){
    card.find(".refresh-container").fadeOut(500, function () {
        card.find(".refresh-container").remove();
    });
}
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
        'viewParams' => ['jobsApplied' => $jobsApplied],
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
                <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer', "Loading Interview Questions..") ?></h4>
            </div>
            <div class="modal-body">
                <div class="loading-bar indeterminate margin-top-10"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-ripple" data-dismiss="modal"><?= Yii::t('app', "Close") ?></button>
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