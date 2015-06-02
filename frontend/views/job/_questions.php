<?php
/* @var $model employer\models\Job */
?>

<div class="modal-header">
    <h4 class="modal-title"><?= Yii::t("frontend", "Interview Questions") ?></h4>
</div>
<div class="modal-body">
    <?php if($model->job_question_1){ ?>
    <?= $model->job_question_1 ?>
    <div class="inputer">
        <div class="input-wrapper">
            <textarea name="question1" class="form-control js-auto-size question1" rows="1"></textarea>
        </div>
    </div>
    <?php } ?>

    <?php if($model->job_question_2){ ?>
    <?= $model->job_question_2 ?>
    <div class="inputer">
        <div class="input-wrapper">
            <textarea name="question2" class="form-control js-auto-size question2" rows="1"></textarea>
        </div>
    </div>
    <?php } ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('app',"Close") ?></button>
    <button type="button" class="btn btn-cyan interviewSubmit" style="font-weight:bold;" data-job="<?= $model->job_id ?>">
            <?= Yii::t("frontend", "Apply") ?>
    </button>
</div>