<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Merge Universities');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("
    $('input[name=\'selection[]\']').change(function() {
        if($('input[name=\'selection[]\']:checked').length > 0 && $('#submit-button[disabled]').length > 0) {
            $('#submit-button').removeAttr('disabled');
        } else if ($('input[name=\'selection[]\']:checked').length == 0) {
            $('#submit-button').attr('disabled', true);
        }
    });
");

?>
<div class="university-list-merge">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => '',
            ],

            //'university_id',
            'university_name_en',
            'university_domain',
            'isVerificationRequired',
            'numberOfStudents',
            'numberOfVerifiedStudents',
            // 'university_id_template',
            // 'university_logo',
            // 'university_graphic',
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Merge Universities'), ['class' => 'btn btn-success', 'id' => 'submit-button', 'disabled' => true]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
