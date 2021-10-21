<?php

use humhub\libs\Html;
use humhub\modules\newmembers\forms\NewMembersConfigureForm;
use humhub\widgets\Button;
use yii\bootstrap\ActiveForm;

/* @var NewMembersConfigureForm $model */
?>

<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('NewmembersModule.base', '<strong>New Members</strong> Module Configuration'); ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'panelTitle') ?>
        <?= $form->field($model, 'maxMembers') ?>
        <?= $form->field($model, 'fromDate') ?>

        <?= Html::label(Yii::t('NewmembersModule.base', 'Show on dashboard'), null, ['class' => 'control-label']) ?>
        <?= $form->field($model, 'displayForMembers')->checkbox() ?>
        <?= $form->field($model, 'displayForGuests')->checkbox() ?>

        <hr>

        <?= Button::save()->submit() ?>
        <?= Button::defaultType(Yii::t('NewmembersModule.base', 'Back to modules'))->link(['/admin/module']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
