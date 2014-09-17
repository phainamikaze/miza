<?php

class InfrastructureController extends Controller
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
                'actions'=>array('ValidName'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('index'),
                'users'=>array('@'),
                'expression' => array($this, 'blockAlreadyInfraId'), 
            ),
            array('deny',
                'actions'=>array('index'),
                'users'=>array('@'),
                'expression' => array($this, 'allowNonInfraId'), 
                'deniedCallback' => array($this, 'redirectToInfraList'), 
            ),
            array('allow',
                'actions'=>array('Mylist','Launcher'),
                'users'=>array('@'),
                'expression' => array($this, 'allowNonInfraId'), 
            ),
            array('deny',
                'actions'=>array('Mylist','Launcher'),
                'users'=>array('@'),
                'expression' => array($this, 'blockAlreadyInfraId'), 
                'deniedCallback' => array($this, 'redirectToDashBoard'), 
            ),
            array('deny'),
        );
    }
    public function redirectToDashBoard(){
       $this->redirect(Yii::app()->baseUrl.'/DashBoard');
    }
    public function redirectToInfraList(){
       $this->redirect(Yii::app()->baseUrl.'/infrastructure/mylist');
    }
    public function allowNonInfraId(){
        if(Yii::app()->user->my_infrastructureid==''){
            return true;
        }else{
            return false;
        }
    }
    public function blockAlreadyInfraId(){
        if(Yii::app()->user->my_infrastructureid==''){
            return false;
        }else{
            return true;
        }
    }

    public function actionIndex(){

    	$this->render('index');

	}
    public function actionLauncher(){
        if(!empty($_POST) && $_POST['action']=="launcherinfra"){
            Yii::app()->user->my_infrastructureid = $_POST['infrastructureid'];
            Yii::app()->user->my_infrastructurename = $_POST['infrastructurename'];
            $this->redirect(Yii::app()->baseUrl.'/DashBoard');
        }
    }

    public function actionMylist() {
        if(false){
            $this->redirect(Yii::app()->baseUrl.'/login');
        }
        $msgInfo = "none";
        $msgError= "none";
        if(!empty($_POST) && $_POST['action']=="create"){
            //if(AccountInfrastructure::model()->findByAttributes(array(''=>$_REQUEST['infraname']))
                $newinfra = new Infrastructure();
                $newinfra->Name = $_POST['infraname'];
                $newinfra->Device = 1;
                if($newinfra->save()){

                    $newAcctInfra = new AccountInfrastructure();
                    $newAcctInfra->Account_Id = Yii::app()->user->getId();
                    $newAcctInfra->Infrastructure_Id = $newinfra->Id;
                    $newAcctInfra->IsOnwer = 1;
                     if($newAcctInfra->save()){

                        $msgInfo = "Create the Infrastructure Successfully";

                     }else {
                        print_r($newAcctInfra->errors);
                    }
                }else {
                    print_r($newinfra->errors);
                }
        }

        $myaccount = Account::model()->findByPk(Yii::app()->user->getId());
        $this->renderPartial('mylist',array('msgError'=>$msgError,'msgInfo'=>$msgInfo,'infralist'=>$myaccount));
    }


    public function actionValidName(){

        $record = Infrastructure::model()->findByAttributes(array('Name'=>$_REQUEST['infraname']));
        $count=count($record);
        if ($count===0)
            $output=true;
        else
            $output=false;

        echo json_encode($output);
    }




}