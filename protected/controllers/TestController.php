<?php 
class TestController extends Controller {
	public function actionIndex(){

		echo "2";

	}
	public function actionIndex2(){

		$this->render('eeee',array('a1' => 123, 'a2' => "uytrewrtyuiopoiuytr"));

	}

}