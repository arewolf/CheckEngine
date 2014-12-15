<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		//validate user credentials here

		$user_name = $_POST['user_name'];
		$password = md5($_POST['password']);


		if (!empty($user_id)) {

			$user = new User($user_id);

			$this->view['user_id'] = $user->user_id;
			$this->view['username'] = $user->username;
			$this->view['first_name'] = $user->first_name;
			$this->view['last_name'] = $user->last_name;
			$this->view['email'] = $user->email;
		} else {
			$this->view['user_id'] = FALSE;
		}
	}
}
$controller = new Controller();
