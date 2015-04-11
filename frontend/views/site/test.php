<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = Yii::t('app','Test Page');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is a test page</p>
    
    <?= $this->params['isArabic']?'is Arabic':'is English' ?>
    
</div>