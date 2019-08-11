<?php

namespace humhub\modules\newmembers\forms;

use Yii;
use yii\base\Model;

class NewMembersConfigureForm extends Model
{

    public $panelTitle;
    public $maxMembers;
    public $fromDate;

    public function rules()
    {
        return [
            [['maxMembers', 'panelTitle'], 'required'],
            ['maxMembers', 'integer', 'min' => '0'],
            ['fromDate', 'date', 'format' => 'yyyy-MM-dd hh:mm:ss'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'panelTitle' => Yii::t('NewmembersModule.base', 'The panel title for the dashboard widget.'),
            'maxMembers' => Yii::t('NewmembersModule.base', 'The number of most active users that will be shown.'),
            'fromDate' => Yii::t('NewmembersModule.base', 'From which registration date should new users displayed as new?'),
        ];
    }

}
