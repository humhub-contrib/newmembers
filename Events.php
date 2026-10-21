<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\newmembers;

use humhub\modules\newmembers\widgets\NewMembersSidebarWidget;

class Events
{
    public static function onSidebarInit($event)
    {
        $event->sender->addWidget(NewMembersSidebarWidget::class, [], ['sortOrder' => 300]);
    }
}
