<?php

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $filter frontend\models\FilterForm */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $jobsApplied array */
/* @var $availableIndustries array */
/* @var $availableJobTypes array */
/* @var $availablePaymentOptions array */

$this->title = Yii::t('frontend', 'Browse Jobs');
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Browse Jobs');

$css = "
.shareButtons div{text-align:center;}
.summary{text-align:center;}
.empty{text-align:center; font-size:1.7em;}
label{display:none;}
";


/**
 * Share Job Functionality
 */
$js = '
var $shareJob = $("#shareDialog").find(".modal-content");
var shareLoadingIndicator = $shareJob.html();

$("#jobList").on("click", ".jobShare", function(){
    var sharedataLink = $(this).attr("data-job");

    $.ajax({
        url: sharedataLink,
        cache: false,
        beforeSend: function () {
            $shareJob.html(loadingIndicator);
        },
        success: function(response, textStatus, jqXHR)
        {
            $shareJob.html(response);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
    });
});
';

/**
 * Loading Job Details Functionality
 */
$js .= '
var $aboutJob = $("#about-job").find(".modal-content");
var loadingIndicator = $aboutJob.html();
var currentCard;
var fromModal = false;

$("#about-job").on("hide.bs.modal", function (e) {
  fromModal = false;
})
$("#about-job").on("show.bs.modal", function (e) {
  fromModal = true;
})

$("#jobList").on("click", ".jobDetail", function(){
    currentCard = $(this).parent().parent().parent().parent();
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
            $("#about-job").modal("hide");
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
        url: "' . $applyLink . '",
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

/**
 * Filtering Functionality
 */
$js .= '
$("#filterForm").on("change","select",function(){
    $("#filterForm").submit();
});
';

/**
 * Mobile Select Functionality
 */
$js .= '
function isMobile(){
    var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
if(isMobile()){
    $(".selecter").selectpicker("mobile");
}
';

$this->registerCssFile("@web/plugins/bootstrap-social/bootstrap-social.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCss($css);
$this->registerJs($js);
?>

<div class="panel panel-with-shadow">
    <div class="panel-heading">
        <div class="panel-title"><h4><?= Yii::t("frontend", "Filters") ?></h4></div>
    </div><!--.panel-heading-->
    <div class="panel-body">
        <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'filterForm', 'method'=>'get']); ?>
            <div class="col-sm-4">
                <?= $form->field($filter, 'jobtype')->dropDownList($availableJobTypes, [
                        'class' => 'selecter',
                        'prompt' => Yii::t('frontend', 'All Job Types'),
                        'data-width' => '100%'
                    ]) 
                ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($filter, 'industry')->dropDownList($availableIndustries, [
                        'class' => 'selecter',
                        'prompt' => Yii::t('frontend', 'All Industries'),
                        'data-width' => '100%'
                    ]) 
                ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($filter, 'payment')->dropDownList($availablePaymentOptions, [
                        'class' => 'selecter',
                        'prompt' => Yii::t('frontend', 'Any Compensation'),
                        'data-width' => '100%'
                    ]) 
                ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
        <div class="row" style="margin-top:0.5em;">
            <div class="col-md-6 col-md-offset-3">
                <a href="<?= Url::to(['job/index']) ?>" class="btn btn-primary btn-block button-striped button-full-striped"><?= Yii::t("frontend", "Clear Filters") ?></a>
            </div>
        </div>
    </div><!--.panel-body-->
</div>

<div id="jobList">
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'col-md-4 col-sm-6', 'style' => ''],
        'itemView' => "_job",
        'viewParams' => ['jobsApplied' => $jobsApplied],
    ])
    ?>
</div>

<!-- Share Modal -->
<div class="modal scale fade" id="shareDialog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center"><?= Yii::t('employer', "Loading Job Details..") ?></h4>
            </div>
            <div class="modal-body">
                <div class="loading-bar indeterminate margin-top-10"></div>
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