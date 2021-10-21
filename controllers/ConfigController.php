<?php

namespace humhub\modules\newmembers\controllers;

use Yii;
use humhub\modules\admin\components\Controller;
use humhub\modules\newmembers\forms\NewMembersConfigureForm;

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

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            $this->view->saved();
        }

        return $this->render('config', ['model' => $form]);
    }

}
