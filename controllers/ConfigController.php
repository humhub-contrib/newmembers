<?php

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.newmembers.controllers
 * @author Marjana Pesic
 */
class ConfigController extends Controller
{

    public $subLayout = "application.modules_core.admin.views._layout";

    /**
     *
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl'
        ); // perform access control for CRUD operations

    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     *
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'expression' => 'Yii::app()->user->isAdmin()'
            ),
            array(
                'deny', // deny all users
                'users' => array(
                    '*'
                )
            )
        );
    }

    /**
     * Configuration Action for Super Admins
     */
    public function actionConfig()
    {
        Yii::import('newmembers.forms.*');

        $form = new NewMembersConfigureForm();

        if (isset($_POST['NewMembersConfigureForm'])) {
            $_POST['NewMembersConfigureForm'] = Yii::app()->input->stripClean($_POST['NewMembersConfigureForm']);
            $form->attributes = $_POST['NewMembersConfigureForm'];

            if ($form->validate()) {
                $form->panelTitle = HSetting::Set('panelTitle', $form->panelTitle, 'newmembers');
                $form->maxMembers = HSetting::Set('maxMembers', $form->maxMembers, 'newmembers');
                $form->fromDate = HSetting::Set('fromDate', $form->fromDate, 'newmembers');
                $this->redirect(Yii::app()->createUrl('newmembers/config/config'));
            }
        } else {
            $form->panelTitle = HSetting::Get('panelTitle', 'newmembers');
            $form->maxMembers = HSetting::Get('maxMembers', 'newmembers');
            $form->fromDate = HSetting::Get('fromDate', 'newmembers');
        }

        // set flash message
        Yii::app()->user->setFlash('data-saved', Yii::t('AdminModule.controllers_SettingController', 'Saved'));

        $this->render('config', array(
            'model' => $form
        ));

    }
}

?>
