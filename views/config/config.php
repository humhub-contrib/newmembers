<?php

use yii\helpers\Url;
use yii\helpers\Html;
use humhub\compat\CActiveForm;
?>

<div class="panel panel-default">
    <div
        class="panel-heading"><?php echo Yii::t('NewmembersModule.base', '<strong>New Members</strong> Module Configuration'); ?></div>
    <div class="panel-body">

        <br>

        <?php $form = CActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'panelTitle'); ?>
            <?php echo $form->textField($model, 'panelTitle', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'panelTitle'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'maxMembers'); ?>
            <?php echo $form->textField($model, 'maxMembers', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'maxMembers'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'fromDate'); ?>
            <?php echo $form->textField($model, 'fromDate', array('class' => 'form-control')); ?>
            <p class="help-block"><?php echo Yii::t('NewmembersModule.base', 'This value is maybe necessary after an import from existing users. Let it empty if your user base grows naturally.'); ?></p>
            <?php echo $form->error($model, 'fromDate'); ?>

        </div>

        <hr>
        <?php echo Html::submitButton(Yii::t('NewmembersModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default"
           href="<?php echo Url::to(['/admin/module']); ?>"><?php echo Yii::t('NewmembersModule.base', 'Back to modules'); ?></a>

        <!-- show flash message after saving -->
        <?php echo humhub\widgets\DataSaved::widget(); ?>

        <?php CActiveForm::end(); ?>
    </div>
</div>