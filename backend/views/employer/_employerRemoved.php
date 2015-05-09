<?php
use yii\helpers\Html;
/* @var $model common\models\Employer */
?>

<div style="border:1px solid grey; padding:1em; margin-top:1.5em;">
    <div class="row">
        <div class="col-xs-9">
            <h4 style="margin:0;">
                <?= Html::a(Html::encode($model->employer_company_name), [
                    'view', 'id' => $model->employer_id],[
                        'target' => '_blank'
                    ]) ?>
            </h4>
            <?= $model->employer_support_field ?><br/>
            <?= Yii::$app->formatter->asRelativeTime($model->employer_datetime) ?>
        </div>
        <div class="col-xs-3" style="text-align: right">
            <?= Html::a("<span class='glyphicon glyphicon-repeat'></span> Restore", ['list-removed'], [
                'class' => 'btn btn-xs btn-success',
                'data' => [
                    'confirm' => 'Are you sure you want to restore this employer?',
                    'method' => 'post',
                    'params' => [
                        'restore' => $model->employer_id,
                    ]
                ],
            ]) ?>
        </div>
    </div>
</div>