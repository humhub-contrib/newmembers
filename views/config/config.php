<div class="panel panel-default">
    <div
        class="panel-heading"><?php echo Yii::t('NewMembersModule.base', '<strong>New Members</strong> Module Configuration'); ?></div>
    <div class="panel-body">

        <br>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'new-members-configure-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'panelTitle'); ?>
            <?php echo $form->textField($model, 'panelTitle', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'panelTitle'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'maxMembers'); ?>
            <?php echo $form->numberField($model, 'maxMembers', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'maxMembers'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'fromDate'); ?>
            <?php //echo HHtml::dateTimeField('fromDate', HSetting::Get('maxMembers', 'newmembers'), array('class' => 'form-control', 'id' => 'fromDate')); ?>
            <?php echo $form->textField($model, 'fromDate', array('class' => 'form-control')); ?>
            <p class="help-block"><?php echo Yii::t('NewMembersModule.base', 'This value is maybe necessary after an import from existing users. Let it empty if your user base grows naturally.'); ?></p>
            <?php echo $form->error($model, 'fromDate'); ?>

        </div>

        <hr>
        <?php echo CHtml::submitButton(Yii::t('NewMembersModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default"
           href="<?php echo $this->createUrl('//admin/module'); ?>"><?php echo Yii::t('NewMembersModule.base', 'Back to modules'); ?></a>

        <!-- show flash message after saving -->
        <?php $this->widget('application.widgets.DataSavedWidget'); ?>

        <?php $this->endWidget(); ?>
    </div>
</div>