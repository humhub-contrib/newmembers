<?php

namespace humhub\modules\newmembers;

use yii\helpers\Url;

class Module extends \humhub\components\Module
{
    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/newmembers/config/config']);
    }
}
