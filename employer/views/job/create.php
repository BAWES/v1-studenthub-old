<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = Yii::t('employer', 'Post a Job Opening');

$this->params['breadcrumbs'][] = ['label' => Yii::t('employer', 'Dashboard'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>Step 1: Basic Details</h4>
            <div class="steps-pull-right">
                <ul class="wizard-steps">
                    <li class="step" id="step1"><a href="#firstStep" class="btn btn-teal btn-ripple">1<span class="ripple _2 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span><span class="ripple _3 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span><span class="ripple _4 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span><span class="ripple _5 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span><span class="ripple _6 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span><span class="ripple _7 animate" style="height: 28px; width: 28px; top: 4px; left: -1px;"></span></a></li>
                    <li class="step" id="step2"><a href="#secondStep" class="btn btn-white btn-ripple">2</a></li>
                    <li class="step" id="step3"><a href="#thirdStep" class="btn btn-white btn-ripple">3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="panel-body">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>

</div>