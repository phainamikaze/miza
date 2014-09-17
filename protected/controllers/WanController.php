<?php

class WanController extends Controller
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
    

    public function actionIndex(){

		$this->render('index');

	}

	public function actionStatus(){


		/*$record = Wan::model()->findByAttributes(
			array(
				'm_id'	=> Yii::app()->user->my_mikrotikid,
		    ),
		   	array(
				'limit' => 1,
		    )
		);
		*/

		$this->render('status');

	}








}