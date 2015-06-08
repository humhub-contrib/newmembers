<?php

Yii::app()->moduleManager->register(array(
    'id' => 'newmembers',
    'class' => 'application.modules.newmembers.NewMembersModule',
    'import' => array(
        'application.modules.newmembers.*',
    ),
    // Events to Catch 
    'events' => array(
        array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('NewMembersModule', 'onSidebarInit')),
    ),
));
?>
