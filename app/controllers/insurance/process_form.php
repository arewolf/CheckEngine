<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Update Customer
		if ($_POST['insurance_id']){
			$insurance = new Insurance($_POST['insurance_id']);
			$insurance->update($_POST);
		//New Customer
		}else{
			$insurance = new Insurance($_POST);
		}
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/insurance/log';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();