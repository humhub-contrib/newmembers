<?php

use yii\helpers\Url;
use yii\helpers\Html;
use humhub\widgets\DataSaved;
use humhub\compat\CActiveForm;
?>

<div class="panel panel-default">
    <div
        class="panel-heading"><?= Yii::t('NewmembersModule.base', '<strong>New Members</strong> Module Configuration'); ?></div>
    <div class="panel-body">

        <br>

        <?php $form = CActiveForm::begin(); ?>

        <?= $form->errorSummary($model); ?>

        <div class="form-group">
            <?= $form->labelEx($model, 'panelTitle'); ?>
            <?= $form->textField($model, 'panelTitle', ['class' => 'form-control']); ?>
            <?= $form->error($model, 'panelTitle'); ?>
        </div>

        <div class="form-group">
            <?= $form->labelEx($model, 'maxMembers'); ?>
            <?= $form->textField($model, 'maxMembers', ['class' => 'form-control']); ?>
            <?= $form->error($model, 'maxMembers'); ?>
        </div>

        <div class="form-group">
            <?= $form->labelEx($model, 'fromDate'); ?>
            <?= $form->textField($model, 'fromDate', ['class' => 'form-control']); ?>
            <p class="help-block"><?= Yii::t('NewmembersModule.base', 'This value is maybe necessary after an import from existing users. Let it empty if your user base grows naturally.'); ?></p>
            <?= $form->error($model, 'fromDate'); ?>

        </div>

        <hr>
        <?php echo Html::submitButton(Yii::t('NewmembersModule.base', 'Save'), ['class' => 'btn btn-primary']); ?>
        <a class="btn btn-default"
           href="<?= Url::to(['/admin/module']); ?>"><?= Yii::t('NewmembersModule.base', 'Back to modules'); ?></a>

        <!-- show flash message after saving -->
        <?= DataSaved::widget(); ?>

        <?php CActiveForm::end(); ?>
    </div>
</div>
