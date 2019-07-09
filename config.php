<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'newmembers',
    'class' => 'humhub\modules\newmembers\Module',
    'namespace' => 'humhub\modules\newmembers',
    'events' => [
        ['class' => Sidebar::class, 'event' => Sidebar::EVENT_INIT, 'callback' => ['humhub\modules\newmembers\Module', 'onSidebarInit']],
    ],
];
?>
