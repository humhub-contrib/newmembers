<?php

namespace humhub\modules\newmembers\widgets;

use humhub\models\Setting;
use humhub\modules\user\models\User;

/**
 * Shows newly registered members as sidebar widget on the dashboard
 *
 * @package humhub.modules_core.directory.widgets
 * @since 0.11
 * @author Andreas Strobel
 */
class NewMembersSidebarWidget extends \humhub\components\Widget
{

    /**
     * Execute widget
     */
    public function run()
    {
        $maxMembers = Setting::Get('maxMembers', 'newmembers');
        $fromDate = Setting::Get('fromDate', 'newmembers');


        $newMembersQuery = User::find();
        $newMembersQuery->limit($maxMembers);
        $newMembersQuery->andWhere(['user.status' => User::STATUS_ENABLED]);
        $newMembersQuery->orderBy(['user.created_at' => SORT_DESC]);
        if ($fromDate != null && $fromDate != "") {
            $newMembersQuery->andWhere(['>=', 'user.created_at', $fromDate]);
        }

        $newMembers = $newMembersQuery->all();

        if (count($newMembers) == 0) {
            return;
        }

        return $this->render('newMembers', array(
                    'newUsers' => $newMembers,
                    'title' => Setting::Get('panelTitle', 'newmembers')
        ));
    }

}

?>
