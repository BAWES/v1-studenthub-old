<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t("frontend", "Employers on StudentHub");
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
      'name' => 'description',
      'content' => 'The full list of employers who are recruiting using StudentHub'
]);

$this->registerCss(" 
#industryListing li{
    list-style-type:circle;
}
");

?>
<div class="panel" id='industryListing'>
    <h2 style="padding:0.8em; padding-bottom:0; margin-bottom:0; text-align:center;"><?= $this->title ?></h2>
    
    <div class="panel-body">
        <?= Yii::t('employer', 'Browse by Industry') ?>
        <div class='row'>
            <div class='col-md-4'>
                <ol>
                    <li><a href="#banking"><?= Yii::t('employer', 'Banking and Investments') ?></a></li>
                    <li><a href="#telecom"><?= Yii::t('employer', 'Telecommunications') ?></a></li>
                    <li><a href="#logistics"><?= Yii::t('employer', 'Logistics & Transport') ?></a></li>
                    <li><a href="#general"><?= Yii::t('employer', 'General Trading, Contracting, Retail, and Wholesale') ?></a></li>
                    <li><a href="#eventmgmt"><?= Yii::t('employer', 'Event Management') ?></a></li>
                    <li><a href="#automotive"><?= Yii::t('employer', 'Automotive') ?></a></li>
                    
                </ol>
            </div>
            <div class='col-md-4'>
                <ol>
                    <li><a href="#marketing"><?= Yii::t('employer', 'Marketing, Media, and Advertising') ?></a></li>
                    <li><a href="#branding"><?= Yii::t('employer', 'Design, Branding, and Copywriting') ?></a></li>
                    <li><a href="#medical"><?= Yii::t('employer', 'Medical and Health Care') ?></a></li>
                    <li><a href="#archi"><?= Yii::t('employer', 'Architecture') ?></a></li>
                    <li><a href="#manufacture"><?= Yii::t('employer', 'Manufacturing') ?></a></li>
                    <li><a href="#tech"><?= Yii::t('employer', 'Technology and Startups') ?></a></li>
                    <li><a href="#accounting"><?= Yii::t('employer', 'Accounting & Consulting') ?></a></li>
                    
                </ol>
            </div>
            <div class='col-md-4'>
                <ol>
                    <li><a href="#foodbev"><?= Yii::t('employer', 'Food & Beverage') ?></a></li>
                    <li><a href="#buservices"><?= Yii::t('employer', 'Business Services') ?></a></li>
                    <li><a href="#fashion"><?= Yii::t('employer', 'Fashion, Cosmetics, and Beauty') ?></a></li>
                    <li><a href="#nonprof"><?= Yii::t('employer', 'Non-Profit') ?></a></li>
                    <li><a href="#sports"><?= Yii::t('employer', 'Sports') ?></a></li>
                    <li><a href="#edu"><?= Yii::t('employer', 'Education and Training') ?></a></li>
                    <li><a href="#hospitality"><?= Yii::t('employer', 'Hospitality and Services') ?></a></li>
                </ol>
            </div>
        </div>
        
    </div>
    
</div>



<div class="row">
    
    <!-- Category -->
    <div class="panel" id='banking'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Banking and Investments') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer70.jpg") ?>" style="width:100%" alt="Gulf Bank">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer69.jpg") ?>" style="width:100%" alt="Warba Bank">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer74.jpg") ?>" style="width:100%" alt="NBK Capital">
                </div>
            </div>
        </div>
    </div>
    
</div>
    
<div class="row">
    <!-- Category -->
    <div class="panel" id='telecom'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Telecommunications') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer65.jpg") ?>" style="width:100%" alt="Ooredoo Kuwait">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer101.jpg") ?>" style="width:100%" alt="Viva Telecommunication Company Kuwait">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer30.jpg") ?>" style="width:100%" alt="Zain FUN">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='logistics'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Logistics & Transport') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer22.jpg") ?>" style="width:100%" alt="Agility">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer68.jpg") ?>" style="width:100%" alt="ARAMEX">
                </div>
            </div>
        </div>
    </div>
    
</div>
    
<div class="row">
    <!-- Category -->
    <div class="panel" id='general'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'General Trading, Contracting, Retail, and Wholesale') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer83.jpg") ?>" style="width:100%" alt="Alghanim Industries">
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
                    <img src="<?= Url::to("@web/images/employer-list/employer55.jpg") ?>" style="width:100%" alt="Baroue">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer53.jpg") ?>" style="width:100%" alt="The Bed Shop">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer93.jpg") ?>" style="width:100%" alt="Lavender Baby and Child">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer95.jpg") ?>" style="width:100%" alt="Tafseel">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='automotive'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Automotive') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer77.jpg") ?>" style="width:100%" alt="Al Babtain Group">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer72.jpg") ?>" style="width:100%" alt="AlQurain Automotive Trading Company">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='marketing'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Marketing, Media, and Advertising') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer29.jpg") ?>" style="width:100%" alt="Richter Creative Office">
                </div>
            </div>
        </div>
    </div>
    
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
                    <img src="<?= Url::to("@web/images/employer-list/employer66.jpg") ?>" style="width:100%" alt="Khaleejesque Media Est.">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer63.jpg") ?>" style="width:100%" alt="WANA Social">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer40.jpg") ?>" style="width:100%" alt="Channels Media">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer35.jpg") ?>" style="width:100%" alt="Socialobby">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer85.jpg") ?>" style="width:100%" alt="Onest">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer41.jpg") ?>" style="width:100%" alt="KwtMagazine">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='branding'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Design, Branding, and Copywriting') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer23.jpg") ?>" style="width:100%" alt="Studio AIO">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer61.jpg") ?>" style="width:100%" alt="Mohtawa Content Marketing">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='eventmgmt'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Event Management') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer89.jpg") ?>" style="width:100%" alt="Vibrant">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer90.jpg") ?>" style="width:100%" alt="Hive Group">
                </div>
            </div>
        </div>
    </div>
    
</div>
    
<div class="row">
    <!-- Category -->
    <div class="panel" id='medical'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Medical and Health Care') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer81.jpg") ?>" style="width:100%" alt="Bayan Medical Company">
                </div>
            </div>
        </div>
    </div>
    
</div>
    
<div class="row">
    <!-- Category -->
    <div class="panel" id='archi'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Architecture') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer45.jpg") ?>" style="width:100%" alt="AHW Architects D+B Projects">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='manufacture'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Manufacturing') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer88.jpg") ?>" style="width:100%" alt="ACICO Constructions. Co.">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer62.jpg") ?>" style="width:100%" alt="Shighileedi">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='tech'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Technology and Startups') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer96.jpg") ?>" style="width:100%" alt="Sirdab Lab">
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
                    <img src="<?= Url::to("@web/images/employer-list/employer97.jpg") ?>" style="width:100%" alt="The White Book">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer102.jpg") ?>" style="width:100%" alt="Snappcard">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer18.jpg") ?>" style="width:100%" alt="3DPme">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer21.jpg") ?>" style="width:100%" alt="KuwaitNET">
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
                    <img src="<?= Url::to("@web/images/employer-list/employer59.jpg") ?>" style="width:100%" alt="Ajar Online General Trading Co.">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer50.jpg") ?>" style="width:100%" alt="Bilbayt.com">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer36.jpg") ?>" style="width:100%" alt="Social Media Club">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer43.jpg") ?>" style="width:100%" alt="Kilshay">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer15.jpg") ?>" style="width:100%" alt="Kuwait Events">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer80.jpg") ?>" style="width:100%" alt="YallaWain">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer20.jpg") ?>" style="width:100%" alt="Design Box">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer82.jpg") ?>" style="width:100%" alt="WAVAI">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer31.jpg") ?>" style="width:100%" alt="PiXIL International Company">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer73.jpg") ?>" style="width:100%" alt="PLUS965">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer98.jpg") ?>" style="width:100%" alt="Wabash Web Development Co. W.L.L.">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='foodbev'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Food & Beverage') ?></h3>
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
                    <img src="<?= Url::to("@web/images/employer-list/employer12.jpg") ?>" style="width:100%" alt="Elevation Burger">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer76.jpg") ?>" style="width:100%" alt="Chocolateness">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer64.jpg") ?>" style="width:100%" alt="Thunaeya International Group">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer67.jpg") ?>" style="width:100%" alt="Arzaq Capital Holding Company">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer37.jpg") ?>" style="width:100%" alt="Kout Food Group">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer48.jpg") ?>" style="width:100%" alt="Melenzane">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer42.jpg") ?>" style="width:100%" alt="SOLO Pizza Napulitana">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer44.jpg") ?>" style="width:100%" alt="Doppio">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer103.jpg") ?>" style="width:100%" alt="Crumbs">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer33.jpg") ?>" style="width:100%" alt="Red Mango">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer34.jpg") ?>" style="width:100%" alt="Freshii">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer38.jpg") ?>" style="width:100%" alt="Rijeemy Center">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer71.jpg") ?>" style="width:100%" alt="Protein Box">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer87.jpg") ?>" style="width:100%" alt="Nomad Bistro">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer26.jpg") ?>" style="width:100%" alt="EDAM INTERNATIONAL TRADING COMPANY">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer57.jpg") ?>" style="width:100%" alt="Feathers">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer94.jpg") ?>" style="width:100%" alt="Glaze">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer58.jpg") ?>" style="width:100%" alt="Make">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer13.jpg") ?>" style="width:100%" alt="Cocoalush">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer75.jpg") ?>" style="width:100%" alt="Juice in a Glass">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer60.jpg") ?>" style="width:100%" alt="Q8Desserts">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer17.jpg") ?>" style="width:100%" alt="Juiced Refreshments Est.">
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='buservices'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Business Services') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer79.jpg") ?>" style="width:100%" alt="Global Markets">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer49.jpg") ?>" style="width:100%" alt="Reyada">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer51.jpg") ?>" style="width:100%" alt="Mubaader Services">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer56.jpg") ?>" style="width:100%" alt="Invita Kuwait for Information Technology KSC">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='accounting'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Accounting & Consulting') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer91.jpg") ?>" style="width:100%" alt="Keepers Accounting and Advisory Services">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer99.jpg") ?>" style="width:100%" alt="francorp kuwait">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer100.jpg") ?>" style="width:100%" alt="Reham Diva">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='fashion'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Fashion, Cosmetics, and Beauty') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer92.jpg") ?>" style="width:100%" alt="Le Sechoir xx">
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
                    <img src="<?= Url::to("@web/images/employer-list/employer54.jpg") ?>" style="width:100%" alt="My Clique Establishment">
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
                    <img src="<?= Url::to("@web/images/employer-list/employer16.jpg") ?>" style="width:100%" alt="Arabic Tattoo">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='nonprof'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Non-Profit') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer39.jpg") ?>" style="width:100%" alt="Reach Education">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer27.jpg") ?>" style="width:100%" alt="Al-KHARAFI ACTIVITY KIDS CENTER">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer25.jpg") ?>" style="width:100%" alt="Taqabal Mental Health Awareness Campaign">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer28.jpg") ?>" style="width:100%" alt="Human Line Organization">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer84.jpg") ?>" style="width:100%" alt="Direct Aid Org.">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='sports'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Sports') ?></h3>
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
                    <img src="<?= Url::to("@web/images/employer-list/employer78.jpg") ?>" style="width:100%" alt="UP Sports">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer24.jpg") ?>" style="width:100%" alt="Flare Fitness Co.">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer46.jpg") ?>" style="width:100%" alt="Concrete Gym">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer47.jpg") ?>" style="width:100%" alt="Just For Kids Fitness Center Company - My Gym Kuwait">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='edu'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Education and Training') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer52.jpg") ?>" style="width:100%" alt="The Scientific Center Management Company">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer32.jpg") ?>" style="width:100%" alt="Coded.">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer86.jpg") ?>" style="width:100%" alt="dars">
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
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer19.jpg") ?>" style="width:100%" alt="Little me">
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <!-- Category -->
    <div class="panel" id='hospitality'>
        <h3 style="padding:0.8em; text-align:center;"><?= Yii::t('employer', 'Hospitality and Services') ?></h3>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer104.jpg") ?>" style="width:100%" alt="Intercontinental Hotels Group">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer105.jpg") ?>" style="width:100%" alt="Crowne Plaza">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Logo -->
    <div class="col-md-2 col-sm-3 col-xs-6">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <img src="<?= Url::to("@web/images/employer-list/employer106.jpg") ?>" style="width:100%" alt="Holiday Inn">
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
