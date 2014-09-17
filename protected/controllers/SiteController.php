<?php

class SiteController extends Controller
{

	public function filters()
    {
        return array(
            'accessControl',
        );
    }

	public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('@'),
            ),

            array('deny'),
        );
    }
    
	public function actionSetMikrotikId() {
        Yii::app()->user->my_mikrotikid = Yii::app()->getRequest()->getParam('m_id');
        $this->redirect(Yii::app()->request->urlReferrer);
    }

}