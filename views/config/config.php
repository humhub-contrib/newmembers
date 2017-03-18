<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="panel panel-default">
    <div
        class="panel-heading"><?= Yii::t('NewmembersModule.base', '<strong>New Members</strong> Module Configuration'); ?></div>
    <div class="panel-body">

        <br>

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?= $form->labelEx($model, 'panelTitle'); ?>
            <?= $form->textField($model, 'panelTitle', array('class' => 'form-control')); ?>
            <?= $form->error($model, 'panelTitle'); ?>
        </div>

        <div class="form-group">
            <?= $form->labelEx($model, 'maxMembers'); ?>
            <?= $form->textField($model, 'maxMembers', array('class' => 'form-control')); ?>
            <?= $form->error($model, 'maxMembers'); ?>
        </div>

        <div class="form-group">
            <?= $form->labelEx($model, 'fromDate'); ?>
            <?= $form->textField($model, 'fromDate', array('class' => 'form-control')); ?>
            <p class="help-block"><?= Yii::t('NewmembersModule.base', 'This value is maybe necessary after an import from existing users. Let it empty if your user base grows naturally.'); ?></p>
            <?= $form->error($model, 'fromDate'); ?>

        </div>

        <hr>
        <?= Html::submitButton(Yii::t('NewmembersModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default"
           href="<?= Url::to(['/admin/module']); ?>"><?= Yii::t('NewmembersModule.base', 'Back to modules'); ?></a>

        <!-- show flash message after saving -->
        <?= humhub\widgets\DataSaved::widget(); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
