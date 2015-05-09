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
            <?= Yii::$app->formatter->asRelativeTime($model->employer_datetime) ?>
        </div>
        <div class="col-xs-3" style="text-align: right">
            <?= Html::a("<span class='glyphicon glyphicon-remove'></span> Remove", ['verify-email-required'], [
                'class' => 'btn btn-xs btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to remove this employer?',
                    'method' => 'post',
                    'params' => [
                        'remove' => $model->employer_id,
                    ]
                ],
            ]) ?>
        </div>
    </div>
</div>