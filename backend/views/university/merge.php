<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $newModel common\models\University */

$this->title = Yii::t('app', 'Merge Universities');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Universities'), 'url' => ['list-merge']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Merge');

$this->registerJs("
    if (!$('#newChoosed').is(':checked')) {
        $('#form-new-university').addClass('hidden');
    }
    $('input[name=\'choosenUniversity\']').on('change', function () {
        if ($('#newChoosed').is(':checked')) {
            $('#form-new-university').removeClass('hidden');
        } else {
            $('#form-new-university').addClass('hidden');
        }
    });
");

?>
<div class="university-merge">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info">
        You are going to merge these Universities. Please select which university to merged into, or you can merge into new University.
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-xs-6">
            <?php foreach ($models as $key => $model): ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="choosenUniversity" value="<?= $model->university_id ?>">
                        <?= $model->university_name_en ?><br>
                        <?= $model->university_name_ar ?>
                    </label>
                </div>
            <?php endforeach; ?>
            <div class="radio">
                <label>
                    <input type="radio" name="choosenUniversity" value="0" id="newChoosed" <?= $isNewUniversity ? 'checked' : '' ?>>
                    New University
                </label>
            </div>
        </div>
    </div>


    <div class="row" id="form-new-university">
        <div class="col-xs-8" style="margin-left: 30px;">

            <?= $form->field($newModel, 'university_name_en')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($newModel, 'university_name_ar')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($newModel, 'university_domain')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($newModel, 'university_require_verify')->widget(SwitchInput::classname(), []) ?>

            <?= $form->field($newModel, 'university_id_template')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-default',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Upload University ID Template'
                ],
            ]) ?>
            
            <?= $form->field($newModel, 'university_logo')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-default',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Upload University Logo'
                ],
            ]) ?>

            <?= $form->field($newModel, 'university_graphic')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-default',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' =>  'Upload University Graphic'
                ],
            ]) ?>

        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Merge'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
