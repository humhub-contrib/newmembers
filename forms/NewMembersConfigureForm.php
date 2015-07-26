<?php

namespace humhub\modules\newmembers\forms;

use Yii;

class NewMembersConfigureForm extends \yii\base\Model
{

    public $panelTitle;
    public $maxMembers;
    public $fromDate;

    public function rules()
    {
        return array(
            array(['maxMembers', 'panelTitle'], 'required'),
            array('maxMembers', 'integer', 'min' => '0'),
            array('fromDate', 'date', 'format' => 'yyyy-MM-dd hh:mm:ss'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'panelTitle' => Yii::t('NewmembersModule.base', 'The panel title for the dashboard widget.'),
            'maxMembers' => Yii::t('NewmembersModule.base', 'The number of most actice users that will be shown.'),
            'fromDate' => Yii::t('NewmembersModule.base', 'From which registration date should new users displayed as new?'),
        );
    }

}
