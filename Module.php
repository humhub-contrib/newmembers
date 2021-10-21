<?php

namespace humhub\modules\newmembers;

use humhub\modules\newmembers\widgets\NewMembersSidebarWidget;
use yii\helpers\Url;

class Module extends \humhub\components\Module
{

    /**
     * @inerhitdoc
     */
    public $resourcesPath = 'resources';

    public static function onSidebarInit($event)
    {
        $event->sender->addWidget(NewMembersSidebarWidget::class, [], ['sortOrder' => 300]);
    }

    /**
     * @inerhitdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/newmembers/config/config']);
    }

}
