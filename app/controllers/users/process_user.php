<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		//process api request for new user
		// need to add validation here
		$safe_values = Validator::validate($_POST);
		//check valuesif values are good
		if (!$safe_values['ERROR']) {//IF VALID DATA THEN
			// Update User
			if ($_POST['user_id']){
				$user = new User($_POST['user_id']);
				$user->update($safe_values);
			
			//New User
			}else{
				$user = new User($safe_values);
			}
			

		if (Access::login($user->username, $user->password)) {
			$this->view['logged_in'] = true;
			$this->view['redirect'] = "/cars/landing";
			 };
		
		} else {
			//return validation error
			$this->view['ERROR'] = $safe_values['ERROR'];
		}

	 }
}
$controller = new Controller();
