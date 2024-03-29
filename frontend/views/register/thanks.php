<?php
/* @var $this yii\web\View */
$this->title = Yii::t('register', 'Thank You!');
$this->registerMetaTag([
      'name' => 'description',
      'content' => 'Thanks for signing up on StudentHub'
]);
$this->params['breadcrumbs'][] = Yii::t('register', 'Thank You!');

?>
<div class="card">
    <div class="panel-body" style="text-align:center;">
        <h1 style="font-size:60px"><?= Yii::t('register', 'Thank You!') ?></h1>                        
        <i class="fa fa-envelope" style="font-size:200px; color:grey; margin-top:-20px; padding-bottom: 20px"></i>
        <p class="sub"><?= Yii::t('register', 'Thanks for signing up, please click on the link sent to you by email to verify your account') ?></p>                                           
        <p class="sub" style="color:red;"><b>AUK Students</b> - Please check your SPAM/Junk folder while we resolve the issue with the University IT Department.</p>                                           
    </div>             
</div>