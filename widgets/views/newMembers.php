<?php

use humhub\modules\user\models\User;
use humhub\widgets\PanelMenu;
use yii\helpers\Html;

/* @var string $title */
/* @var User[] $newUsers */
?>

<div class="panel panel-default panel-new-people" id="panel-new-people">
    <?= PanelMenu::widget(['id' => 'panel-new-people']) ?>
    <div class="panel-heading">
        <?= $title ?>
    </div>
    <div class="panel-body">
        <div class="d-flex gap-2 flex-wrap">
            <?php foreach ($newUsers as $user) : ?>
                <a href="<?= $user->getUrl() ?>">
                    <img src="<?= $user->getProfileImage()->getUrl() ?>" class="rounded tt img_margin"
                         height="40" width="40" alt="40x40" data-src="holder.js/40x40"
                         style="width: 40px; height: 40px;"
                         data-bs-toggle="tooltip" data-placement="top" title=""
                         data-bs-title="<?= Html::encode($user->displayName) ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
