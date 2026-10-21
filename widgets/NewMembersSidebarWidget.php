<?php

namespace humhub\modules\newmembers\widgets;

use humhub\components\Widget;
use humhub\modules\newmembers\forms\NewMembersConfigureForm;
use humhub\modules\user\models\User;
use yii\helpers\HtmlPurifier;

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

        $newMembersQuery = User::find()->visible();
        $newMembersQuery->limit($config->maxMembers);
        $newMembersQuery->andWhere(['user.status' => User::STATUS_ENABLED]);
        $newMembersQuery->orderBy(['user.created_at' => SORT_DESC]);
        if ($config->getSavedFromDate() !== null) {
            $newMembersQuery->andWhere(['>=', 'user.created_at', $config->getSavedFromDate()]);
        }
        $newMembers = $newMembersQuery->all();

        if (empty($newMembers)) {
            return '';
        }

        return $this->render('newMembers', [
            'newUsers' => $newMembers,
            'title' => $this->sanitizeTitle($config->panelTitle),
        ]);
    }

    /**
     * Allows only simple formatting and links in the title, which is entered by an administrator.
     */
    private function sanitizeTitle(string $title): string
    {
        return HtmlPurifier::process($title, [
            'HTML.Allowed' => 'strong,b,em,i,u,br,span[class],a[href|title]',
            'URI.AllowedSchemes' => ['http' => true, 'https' => true],
        ]);
    }
}
