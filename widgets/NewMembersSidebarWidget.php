<?php

/**
 * Shows newly registered members as sidebar widget on the dashboard
 *
 * @package humhub.modules_core.directory.widgets
 * @since 0.11
 * @author Andreas Strobel
 */
class NewMembersSidebarWidget extends HWidget
{

    /**
     * Execute widget
     */
    public function run()
    {
        $maxMembers = HSetting::Get('maxMembers', 'newmembers');
        $fromDate = HSetting::Get('fromDate', 'newmembers');

        if ($fromDate == null || $fromDate == "") {
            $newMembers = User::model()->active()->recently($maxMembers)->findAll();
        } else {
            $newMembers = User::model()->active()->recently($maxMembers)->findAll(array("condition"=>"created_at >= :fromDate", "params" => array(":fromDate" => $fromDate)));
        }

        // Render widgets view
        $this->render('newMembers', array(
            'newUsers' => $newMembers
        ));
    }

}

?>
