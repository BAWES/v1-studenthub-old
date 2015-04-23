<?php
/* @var $this yii\web\View */
$this->title = Yii::t('register', 'Thank You!');
$this->params['breadcrumbs'][] = Yii::t('register', 'Thank You!');

?>
<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?= Yii::t('register', 'Thank You!') ?></h4>
        </div>
    </div>

    <div class="panel-body">

        <h3>Thanks for signing up, blabla email will arrive - please activate</h3>
        
        <p>Meanwhile, you may watch this video explaining how to use StudentHub</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/mJAjL_fTwHA" frameborder="0" allowfullscreen></iframe>
    </div>
</div>