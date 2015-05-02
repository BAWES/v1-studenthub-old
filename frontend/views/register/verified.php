<?php
/* @var $this yii\web\View */
/* @var $idVerified boolean */
$this->title = Yii::t('register', 'Email Verified');
$this->params['breadcrumbs'][] = Yii::t('register', 'Email Verified');

?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('register', 'Email Verified'); ?></h4>
        </div>
    </div>

    <div class="panel-body">

        <h3><?= Yii::t('register', 'Thanks for verifying your email') ?></h3>
        
        <?php if($idVerified){
            //Render Thanks for verifying
            //+ Link to job search area
            ?>
        <p>
            <?= Yii::t('register', 'You may now fully access <b>StudentHub</b>') ?>
        </p>
        <a href="#" class="btn btn-primary"><?= Yii::t('register', 'Browse Jobs') ?></a>
        
        
        
        <?php }else{ 
            //Render to Thanks for verifying + Pls wait while we verify your univ id
            //+ Link to contact us for assistance
            ?>
        <p>
            <?= Yii::t('register', 'Your account will activate as soon as we verify your Student ID') ?>
        </p>
        <p>
            <?= Yii::t('register', 'Please feel free to contact us if you need assistance.') ?>
        </p>
        <a href="#" class="btn btn-primary"><?= Yii::t('register', 'Contact Us') ?></a>
        
        
        <?php } ?>
    </div>
</div>