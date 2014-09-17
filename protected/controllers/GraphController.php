<?php

class GraphController extends Controller
{
	public $actionscript;
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
    

    public function actionIndex(){
		
		//$uri = explode('/', $_SERVER['REQUEST_URI']);
        //print_r($uri);

        //echo Yii::app()->urlManager->parseUrl(Yii::app()->request);
		$this->render('index');

	}
    public function actionAp(){
        
        $this->render('index');

    }








}