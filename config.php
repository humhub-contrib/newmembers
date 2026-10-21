<?php

use humhub\modules\dashboard\widgets\Sidebar;
use humhub\modules\newmembers\Events;
use humhub\modules\newmembers\Module;

return [
    'id' => 'newmembers',
    'class' => Module::class,
    'namespace' => 'humhub\modules\newmembers',
    'events' => [
        ['class' => Sidebar::class, 'event' => Sidebar::EVENT_INIT, 'callback' => [Events::class, 'onSidebarInit']],
    ],
];
