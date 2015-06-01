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

$js = "
//Copy link functionality
$('#share').on('click', '#copyLink', function(){
    var shareUrl = $(this).parent().parent().find('#linktoCopy').val();
    alert(shareUrl);
});
";


$this->registerCssFile("@web/plugins/bootstrap-social/bootstrap-social.css", ['depends' => 'common\assets\TemplateAsset']);
$this->registerCss($css);
$this->registerJs($js);
?>


<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'itemOptions' => ['class' => 'col-md-4', 'style' => ''],
    'itemView' => "_jobdetail",
])
?>

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
<div class="modal fade full-height from-right" id="about-job" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center">Zain</h4>
            </div>
            <div class="modal-body">
                <h3 style="text-align: center; margin-bottom: 1em">Call Center Inbound Agent</h3>
                <div class="panel-group accordion" id="accordion">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" href="#collapse1">About the Company</a>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                The Group’s ﬂagship operation was established in 1983 and made history in 1994 by becoming the first telecom operator to launch a commercial GSM service in the region. Zain Kuwait is the country’s leading operator serving 2.6 million customers as of June 2014, reflecting a market share of 36% and offers a nationwide ultra-fast 4G LTE data network that covers the entire population through 1,787 network sites. Through constant development of the telecommunications infrastructure and proactive marketing initiatives, Zain remains committed to offering customers in Kuwait the most dynamic products and services. The foundation of Zain Kuwait’s achievements lies in the company’s ability to inspire its employees to deliver the best and most imaginative services at every level. With an energetic and inspired predominantly Kuwaiti workforce, the company is committed to employing high caliber people as well as nurturing the finest Kuwaiti talent. With a strong human resources and training program that develops and nurtures leaders in the workplace, the company has consistently opened new doors for its dedicated staff.
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" href="#collapse2">Responsibilities</a>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                You will be responsible for ensuring commercial consistency of the core Voice & data pricing plans,  as well as owning all pricing elements in Voice (including Prepaid, Postpaid for consumer and corporate, in addition to Roaming, International Voice and International SMS) while balancing between competitiveness and profitability.<br>You will also be responsible for providing support to all marketing segments with financial projections and price related matters.
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" href="#collapse3">Qualifications</a>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Have a Bachelor in MIS, Marketing or Finance<br>
                                - 1-2 years of relevant experience<br>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" href="#collapse4">Skills</a>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                            <div class="panel-body">
                                - Good knowledge of all products within a product family<br>
                                - Good level of knowledge of market trends.<br>
                                - Basic knowledge and use of technical principles, theories and concept.<br>
                                - Strong analytical skills and problem solving skills.<br>
                                - The ability to plan.
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="panel-title" data-toggle="collapse" href="#collapse5">Compensation</a>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">
                            <div class="panel-body">
                                TBD
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat-primary" data-dismiss="modal" data-toggle="modal" data-target="#interviewQuestions">Apply</button>                            
            </div>                        
        </div>                                    
    </div><!--.modal-->
</div>