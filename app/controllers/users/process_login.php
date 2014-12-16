<?php

// Controller
class Controller extends AjaxController {
	
	protected function init() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			//gets user name from post array and sets it to view->user_name
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			
			if($user_id = Access::login($username, $password)){
				$this->view['redirect']= "/cars/landing";
			}else{
				echo "error";
			}
		}
		


	}
}
$controller = new Controller();