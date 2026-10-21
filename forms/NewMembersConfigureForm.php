<?php

namespace humhub\modules\newmembers\forms;

use humhub\libs\DbDateValidator;
use humhub\modules\newmembers\Module;
use Yii;
use yii\base\Model;

class NewMembersConfigureForm extends Model
{
    /**
     * @var Module $module
     */
    public $module;

    /**
     * @var string $panelTitle
     */
    public $panelTitle;

    /**
     * @var int $maxMembers
     */
    public $maxMembers;

    /**
     * @var string|null $fromDate Date in the input format of the user, converted to the database format on validation
     */
    public $fromDate;

    /**
     * @var bool $displayForMembers
     */
    public $displayForMembers;

    /**
     * @var bool $displayForGuests
     */
    public $displayForGuests;

    public function init()
    {
        parent::init();

        $this->module = Yii::$app->getModule('newmembers');

        $this->panelTitle = $this->module->settings->get('panelTitle') ?: Yii::t('NewmembersModule.base', 'New Members');
        $this->maxMembers = (int)$this->module->settings->get('maxMembers', 10);
        $this->fromDate = $this->formatDateForInput($this->module->settings->get('fromDate'));
        $this->displayForMembers = (bool)$this->module->settings->get('displayForMembers', true);
        $this->displayForGuests = (bool)$this->module->settings->get('displayForGuests', true);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maxMembers'], 'required'],
            [['panelTitle'], 'string'],
            ['maxMembers', 'integer', 'min' => '0'],
            ['fromDate', DbDateValidator::class, 'convertToFormat' => 'Y-m-d'],
            [['displayForMembers', 'displayForGuests'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'panelTitle' => Yii::t('NewmembersModule.base', 'The panel title for the dashboard widget.'),
            'maxMembers' => Yii::t('NewmembersModule.base', 'The number of new users that will be shown.'),
            'fromDate' => Yii::t('NewmembersModule.base', 'From which registration date should new users displayed as new?'),
            'displayForMembers' => Yii::t('NewmembersModule.base', 'For logged in members'),
            'displayForGuests' => Yii::t('NewmembersModule.base', 'For guests'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'panelTitle' => Yii::t('NewmembersModule.base', 'Simple HTML is allowed: strong, b, em, i, u, br, span (class) and a (href, title).'),
            'fromDate' => Yii::t('NewmembersModule.base', 'This value is maybe necessary after an import from existing users. Let it empty if your user base grows naturally.'),
        ];
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $this->module->settings->set('panelTitle', $this->panelTitle);
        $this->module->settings->set('maxMembers', $this->maxMembers);
        $this->module->settings->set('fromDate', $this->fromDate);
        $this->module->settings->set('displayForMembers', $this->displayForMembers);
        $this->module->settings->set('displayForGuests', $this->displayForGuests);

        // The validator converted the date to the database format, show it again in the input format
        $this->fromDate = $this->formatDateForInput($this->fromDate);

        return true;
    }

    /**
     * @return string|null The saved date in the database format
     */
    public function getSavedFromDate(): ?string
    {
        return $this->module->settings->get('fromDate') ?: null;
    }

    /**
     * @param string|null $date Date in the database format (a time part is ignored)
     * @return string|null Date in the input format of the user
     */
    private function formatDateForInput(?string $date): ?string
    {
        if (empty($date)) {
            return null;
        }

        return Yii::$app->formatter->asDate(substr($date, 0, 10), Yii::$app->formatter->dateInputFormat);
    }

    /**
     * Check if the widget is visible on dashboard for current User
     *
     * @return bool
     */
    public function isVisible(): bool
    {
        if ($this->maxMembers < 1) {
            // Nothing to display
            return false;
        }

        return Yii::$app->user->isGuest ? $this->displayForGuests : $this->displayForMembers;
    }

}
