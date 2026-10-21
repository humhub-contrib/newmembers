<?php

use humhub\modules\user\models\User;
use humhub\modules\user\widgets\Image;
use humhub\widgets\PanelMenu;

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
                <?= Image::widget([
                    'user' => $user,
                    'width' => 40,
                    'tooltipText' => $user->displayName,
                ]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
