<?php

namespace humhub\modules\newmembers\widgets;

use humhub\components\Widget;
use humhub\modules\newmembers\forms\NewMembersConfigureForm;
use humhub\modules\user\models\User;

/**
 * Shows newly registered members as sidebar widget on the dashboard
 *
 * @package humhub.modules_core.directory.widgets
 * @since 0.11
 * @author Andreas Strobel
 */
class NewMembersSidebarWidget extends Widget
{

    /**
     * Execute widget
     */
    public function run()
    {
        $config = new NewMembersConfigureForm();

        if (!$config->isVisible()) {
            return '';
        }

        $newMembersQuery = User::find();
        $newMembersQuery->limit($config->maxMembers);
        $newMembersQuery->andWhere(['user.status' => User::STATUS_ENABLED]);
        $newMembersQuery->orderBy(['user.created_at' => SORT_DESC]);
        if (!empty($config->fromDate)) {
            $newMembersQuery->andWhere(['>=', 'user.created_at', $config->fromDate]);
        }
        $newMembers = $newMembersQuery->all();

        if (empty($newMembers)) {
            return '';
        }

        return $this->render('newMembers', [
            'newUsers' => $newMembers,
            'title' => $config->panelTitle,
        ]);
    }

}
