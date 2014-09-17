<?php

class UserController extends Controller
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
                'users'=>array('*'),
            )
        );
    }

	public function actionLogin(){
		
		if(!empty($_POST) && $_POST['run']==="login")
		{
			if($identity===null)
			{
				$identity=new UserIdentity($_POST['username'],$_POST['password']);
				$identity->authenticate();
			}
			if($identity->errorCode===UserIdentity::ERROR_NONE)
			{
				//$duration=$_POST['rememberme'] ? 3600*24*30 : 0; // 30 days
				$duration=0;
				Yii::app()->user->login($identity);
				Yii::app()->user->login($identity,$duration);
				
				$this->redirect(Yii::app()->baseUrl.'/infrastructure/mylist');
			}
			else if ($identity->errorCode===UserIdentity::ERROR_USERNAME_INVALID)
				$this->renderPartial('login',array('msgError' => "Invalid Username"));
			else if ($identity->errorCode===UserIdentity::ERROR_PASSWORD_INVALID)
				$this->renderPartial('login',array('msgError' => "Invalid password",'username' =>$_POST['username']));
			//$this->renderPartial('login',array('msgError' => "none" ));
		}
		else
		{
			$this->renderPartial('login',array('msgError' => "none" ));
		}

	}
	
	public function actionLogout() {
    	Yii::app()->user->logout();
    	$this->redirect(Yii::app()->baseUrl.'/login');
    }
	public function actionSignup(){

		if(!empty($_POST) && $_POST['run']==="signup"){
			$newuser = new Account();
			$newuser->Username = $_POST['username'];
			$newuser->Pass = $_POST['password'];
			$newuser->Fullname = $_POST['fullname'];
			$newuser->Email = $_POST['email'];
			$newuser->Mobile = $_POST['contact'];
			$newuser->CreateDate = new CDbExpression('NOW()');
			$newuser->LastLogin = '0000-00-00 00:00:00';
			$newuser->LastUpdate = '0000-00-00 00:00:00';
			$newuser->Role = 0;
			if($newuser->save()){         
				$this->renderPartial('signup-ok');
            }else {
			    print_r($newuser->errors);
			}
		}else
			$this->renderPartial('signup');
	}

	public function actionValidUsername(){

		$record = Account::model()->findByAttributes(array('Username'=>$_REQUEST['username']));
		$count=count($record);
		if ($count===0)
			$output=true;
		else
			$output=false;

		echo json_encode($output);
	}
	public function actionValidEmail(){

		$record = Account::model()->findByAttributes(array('Email'=>$_REQUEST['email']));
		$count=count($record);
		if ($count===0)
			$output=true;
		else
			$output=false;

		echo json_encode($output);
	}
	


}