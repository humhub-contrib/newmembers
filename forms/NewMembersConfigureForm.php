<?php
class NewMembersConfigureForm extends CFormModel {

    public $panelTitle;
    public $maxMembers;
    public $fromDate;

    public function rules() {
        return array(
            array('maxMembers, panelTitle', 'required'),
            array('maxMembers', 'compare', 'compareValue'=>'0', 'operator'=>'>=', 'message'=> Yii::t('NewMembersModule.base', 'The number of members must not be negative.')),
            array('fromDate', 'date', 'format' => 'yyyy-MM-dd hh:mm:ss', 'allowEmpty' => true),
        );
    }

    public function attributeLabels() {
        return array(
            'panelTitle' => Yii::t('NewMembersModule.base', 'The panel title for the dashboard widget.'),
            'maxMembers' => Yii::t('NewMembersModule.base', 'The number of most actice users that will be shown.'),
            'fromDate' => Yii::t('NewMembersModule.base', 'From which registration date should new users displayed as new?'),
        );
    }

}