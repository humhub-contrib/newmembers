<?php

class NewMembersModule extends HWebModule
{

    /**
     * On build of the dashboard sidebar widget, add the new members widget if module is enabled.
     *
     * @param type $event
     */
    public static function onSidebarInit($event)
    {
        if (Yii::app()->moduleManager->isEnabled('newmembers')) {

            $event->sender->addWidget('application.modules.newmembers.widgets.NewMembersSidebarWidget', array(), array(
                'sortOrder' => 0
            ));
        }
    }

    public function getConfigUrl()
    {
        return Yii::app()->createUrl('//newmembers/config/config');
    }

    /**
     * Enables this module
     */
    public function enable()
    {
        if (! $this->isEnabled()) {
            // set default config values
            HSetting::Set('panelTitle', 'New Members', 'newmembers');
            HSetting::Set('maxMembers', 10, 'newmembers');
        }
        parent::enable();
    }
}
?>
