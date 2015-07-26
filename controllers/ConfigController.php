<?php

namespace humhub\modules\newmembers\controllers;

use Yii;
use humhub\modules\admin\components\Controller;
use humhub\modules\newmembers\forms\NewMembersConfigureForm;
use humhub\models\Setting;

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.newmembers.controllers
 * @author Marjana Pesic
 */
class ConfigController extends Controller
{

    /**
     * Configuration Action for Super Admins
     */
    public function actionConfig()
    {
        $form = new NewMembersConfigureForm();
        $form->panelTitle = Setting::Get('panelTitle', 'newmembers');
        $form->maxMembers = Setting::Get('maxMembers', 'newmembers');
        $form->fromDate = Setting::Get('fromDate', 'newmembers');

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $form->panelTitle = Setting::Set('panelTitle', $form->panelTitle, 'newmembers');
            $form->maxMembers = Setting::Set('maxMembers', $form->maxMembers, 'newmembers');
            $form->fromDate = Setting::Set('fromDate', $form->fromDate, 'newmembers');

            Yii::$app->getSession()->setFlash('data-saved', Yii::t('AdminModule.controllers_SettingController', 'Saved'));
            $this->redirect(['/newmembers/config/config']);
        }

        return $this->render('config', array('model' => $form));
    }

}

?>
