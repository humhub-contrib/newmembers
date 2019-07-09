<?php

use humhub\widgets\PanelMenu;
use yii\helpers\Html;
?>

<div class="panel panel-default panel-new-people" id="panel-new-people">
    <?= PanelMenu::widget(['id' => 'panel-new-people']); ?>
  <div class="panel-heading">
        <?= $title; ?>
    </div>
    <div class="panel-body">
        <?php foreach ($newUsers as $user) : ?>
            <a href="<?= $user->getUrl(); ?>">
                <img src="<?= $user->getProfileImage()->getUrl(); ?>" class="img-rounded tt img_margin"
                     height="40" width="40" alt="40x40" data-src="holder.js/40x40"
                     style="width: 40px; height: 40px;"
                     data-toggle="tooltip" data-placement="top" title=""
                     data-original-title="<?= Html::encode($user->displayName); ?>">
            </a>
        <?php endforeach; ?>
    </div>
</div>
