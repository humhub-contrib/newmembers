<?php

use humhub\modules\dashboard\widgets\Sidebar;

return [
    'id' => 'newmembers',
    'class' => 'humhub\modules\newmembers\Module',
    'namespace' => 'humhub\modules\newmembers',
    'events' => array(
        array('class' => Sidebar::className(), 'event' => Sidebar::EVENT_INIT, 'callback' => array('humhub\modules\newmembers\Module', 'onSidebarInit')),
    ),
];
?>
