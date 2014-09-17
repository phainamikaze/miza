<?php

class ProfileController extends Controller
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
                'actions'=>array('index','settings'),
                'users'=>array('@'),
                'expression' => array($this, 'allowAlreadyInfraId'), 
            ),
            array('deny',
                'users'=>array('@'),
                'expression' => array($this, 'blockNonInfraId'), 
                'deniedCallback' => array($this, 'redirectToInfraList'), 
            ),
            array('deny'),
        );
    }
    public function redirectToInfraList(){
       $this->redirect(Yii::app()->baseUrl.'/infrastructure/mylist');
    }
    public function allowAlreadyInfraId(){
        if(Yii::app()->user->my_infrastructureid==''){
            return false;
        }else{
            return true;
        }
    }
    public function blockNonInfraId(){
        if(Yii::app()->user->my_infrastructureid==''){
            return true;
        }else{
            return false;
        }
    }

	public function actionIndex() {


    	$this->render('index');
    }
    public function actionSettings() {


        $this->render('settings');
    }

}