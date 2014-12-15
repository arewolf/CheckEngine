<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Update Customer
		if ($_POST['user_id']){
			$insurance = new Insurance($_POST['user_id']);
			$insurance->update($_POST);
		//New Customer
		}else{
			$insurance = new Insurance($_POST);
		}
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/insurance/landing';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();