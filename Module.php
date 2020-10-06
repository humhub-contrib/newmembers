<?php

namespace humhub\modules\newmembers;

use yii\helpers\Url;
use humhub\models\Setting;
use humhub\modules\newmembers\widgets\NewMembersSidebarWidget;

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

    /**
     * @inerhitdoc
     */
    public function enable()
    {
        parent::enable();
        Setting::Set('panelTitle', 'New Members', 'newmembers');
        Setting::Set('maxMembers', 10, 'newmembers');
    }

}

?>
