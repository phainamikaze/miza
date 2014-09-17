<?php

class DashBoardController extends Controller
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
                'actions'=>array('index'),
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
    

    public function actionIndex(){
		
		//$uri = explode('/', $_SERVER['REQUEST_URI']);
        //print_r($uri);

        //echo Yii::app()->urlManager->parseUrl(Yii::app()->request);

		$this->render('index');

	}








}